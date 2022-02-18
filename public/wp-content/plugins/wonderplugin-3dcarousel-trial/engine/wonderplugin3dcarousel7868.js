/** Wonderplugin 3D Carousel Plugin Trial Version
 * Copyright 2019 Magic Hills Pty Ltd All Rights Reserved
 * Website: http://www.wonderplugin.com
 * Version 3.9
 */
(function ($) {
    function WP3DCarouselTimer(interval, callback, updatecallback) {
        var timerInstance = this;
        timerInstance.timeout = interval;
        var updateinterval = 50;
        var updateTimerId = null;
        var runningTime = 0;
        var paused = false;
        var started = false;
        var startedandpaused = false;
        this.pause = function () {
            if (started) {
                paused = true;
                clearInterval(updateTimerId);
            }
        };
        this.resume = function (forceresume) {
            if (startedandpaused && !forceresume) return;
            startedandpaused = false;
            if (started && paused) {
                paused = false;
                clearInterval(updateTimerId);
                updateTimerId = setInterval(function () {
                    runningTime += updateinterval;
                    if (runningTime > timerInstance.timeout) {
                        clearInterval(updateTimerId);
                        if (callback) callback();
                    }
                    if (updatecallback) updatecallback(runningTime / timerInstance.timeout);
                }, updateinterval);
            }
        };
        this.stop = function () {
            clearInterval(updateTimerId);
            if (updatecallback) updatecallback(-1);
            runningTime = 0;
            paused = false;
            started = false;
        };
        this.start = function () {
            runningTime = 0;
            paused = false;
            started = true;
            clearInterval(updateTimerId);
            updateTimerId = setInterval(function () {
                runningTime += updateinterval;
                if (runningTime > timerInstance.timeout) {
                    clearInterval(updateTimerId);
                    if (callback) callback();
                }
                if (updatecallback) updatecallback(runningTime / timerInstance.timeout);
            }, updateinterval);
        };
        this.startandpause = function () {
            runningTime = 0;
            paused = true;
            started = true;
            startedandpaused = true;
        };
    }
    $.fn.wonderplugin3dcarousel = function (options) {
        var TYPE_VIDEO_FLASH = 5,
            TYPE_VIDEO_MP4 = 6,
            TYPE_VIDEO_OGG = 7,
            TYPE_VIDEO_WEBM = 8,
            TYPE_VIDEO_YOUTUBE = 9,
            TYPE_VIDEO_VIMEO = 10;
        var LegacyCarousel = function (parentObject, container, options, id) {
            this.parentObject = parentObject;
            this.container = container;
            this.options = options;
            this.id = id;
            this.curItem = -1;
        };
        LegacyCarousel.prototype = {
            init: function () {
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ display: "block", opacity: 0, visibility: "hidden" });
                if (this.curItem < 0) this.curItem = this.options.firstitem;
                this.direction = 0;
                this.totalItems = items.length;
                this.initClickHandler();
                this.initSize();
                this.gotoItem(this.curItem);
            },
            resizeObject: function () {
                var screensize = this.parentObject.checkScreen();
                if (this.screenstatus != screensize) {
                    this.screenstatus = screensize;
                    this.initSize();
                    this.parentObject.resizeImages();
                    this.gotoItem(this.curItem);
                }
            },
            initSize: function () {
                this.screenstatus = this.parentObject.checkScreen();
                if (this.screenstatus == "small") {
                    this.visibleitems = this.options.small_visibleitems;
                    this.itemW = this.options.small_width;
                    this.itemH = this.options.small_height;
                    this.transition = this.options.small_transition;
                    this.carouselmargin = this.options.small_carouselmargin;
                } else if (this.screenstatus == "medium") {
                    this.visibleitems = this.options.medium_visibleitems;
                    this.itemW = this.options.medium_width;
                    this.itemH = this.options.medium_height;
                    this.transition = this.options.medium_transition;
                    this.carouselmargin = this.options.medium_carouselmargin;
                } else {
                    this.visibleitems = this.options.visibleitems;
                    this.itemW = this.options.width;
                    this.itemH = this.options.height;
                    this.transition = this.options.transition;
                    this.carouselmargin = this.options.carouselmargin;
                }
                this.itemImgW = this.itemW - 2 * this.options.itemborder;
                this.itemImgH = this.itemH - 2 * this.options.itemborder;
                this.sideCount = Math.floor((this.visibleitems - 1) / 2);
                this.container.css({ "box-sizing": "border-box" });
                this.container.find("*").css({ "box-sizing": "border-box" });
                $(".wonderplugin3dcarousel-list-container", this.container).css({ display: "block", position: "relative", width: "100%", height: "auto", overflow: "hidden", margin: 0, padding: this.carouselmargin });
                $(".wonderplugin3dcarousel-list", this.container).css({ width: "100%", height: this.itemH + "px", margin: 0, padding: 0 });
                $(".wonderplugin3dcarousel-item", this.container).css({ width: this.itemW + "px", position: "absolute", top: 0, left: "50%", "margin-left": "-" + this.itemW / 2 + "px" });
                $(".wonderplugin3dcarousel-content", this.container).css({ "background-color": this.options.itembgcolor, padding: this.options.itemborder + "px" });
                $(".wonderplugin3dcarousel-image", this.container).css({ display: "block", position: "relative", width: this.itemImgW + "px", height: this.itemImgH + "px", overflow: "hidden" });
                $(".wonderplugin3dcarousel-img-container", this.container).css({ display: "block", position: "relative", width: "100%", "max-width": "100%", height: "100%", "max-height": "100%" });
                $(".wonderplugin3dcarousel-img", this.container).css({ display: "inline", "max-width": "100%", outline: "1px solid transparent" });
            },
            initClickHandler: function () {
                var instance = this;
                $(".wonderplugin3dcarousel-item", this.container).click(function () {
                    var disableWeblink = instance.options.onlyenableweblinkoncenter && $(this).find(".wonderplugin3dcarousel-item-weblink").length > 0 && $(this).index() != instance.curItem;
                    instance.gotoItem($(this).index());
                    if (disableWeblink) return false;
                });
            },
            gotoPrev: function () {
                var itemId = this.curItem - 1;
                if (itemId < 0) itemId = this.options.loop || this.options.loopslide ? this.totalItems - 1 : 0;
                this.direction = -1;
                this.gotoItem(itemId);
            },
            gotoNext: function () {
                var itemId = this.curItem + 1;
                if (itemId >= this.totalItems) itemId = this.options.loop || this.options.loopslide ? 0 : this.totalItems - 1;
                this.direction = 1;
                this.gotoItem(itemId);
            },
            gotoItem: function (itemId) {
                this.parentObject.slideTimeout.stop();
                this.prevItem = this.curItem;
                this.curItem = itemId;
                this.container.trigger("wonderplugin3dcarousel.beforeswitch", [this.prevItem, this.curItem]);
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ "-webkit-transition": "none", "-moz-transition": "none", "-o-transition": "none", "-ms-transition": "none", transition: "none" });
                items.removeClass("wonderplugin3dcarousel-item-current");
                items.eq(this.curItem).addClass("wonderplugin3dcarousel-item-current");
                if (this.options.pausevideonotinmiddle)
                    items.not(".wonderplugin3dcarousel-item-current").each(function () {
                        if ($(this).find("video").length > 0) $(this).find("video").get(0).pause();
                    });
                var pos = items.eq(this.curItem).data("pos");
                var dir = this.visibleitems == 1 ? this.direction : pos;
                if (this.totalItems > this.visibleitems)
                    if (dir < 0)
                        for (var i = 0; i <= this.sideCount; i++) {
                            var sideItem = this.curItem - i;
                            if (sideItem < 0) {
                                if (!this.options.loop) break;
                                sideItem = this.totalItems + sideItem;
                            }
                            items.eq(sideItem).css({ "margin-left": "-" + (this.itemW / 2 + this.itemW * (i - dir)) + "px" });
                        }
                    else if (dir > 0)
                        for (var i = 0; i <= this.sideCount; i++) {
                            var sideItem = this.curItem + i;
                            if (sideItem >= this.totalItems) {
                                if (!this.options.loop) break;
                                sideItem = sideItem - this.totalItems;
                            }
                            items.eq(sideItem).css({ "margin-left": this.itemW / 2 + this.itemW * (i + dir - 1) + "px" });
                        }
                var instance = this;
                setTimeout(function () {
                    instance.goAnimation(dir);
                    instance.container.trigger("wonderplugin3dcarousel.switch", [instance.prevItem, instance.curItem]);
                    if (instance.parentObject.autosliding && !instance.parentObject.isMousePaused && !instance.parentObject.isVideoPaused) {
                        var islast = (instance.options.autoslidedir == "right" && instance.curItem >= instance.totalItems - 1) || (instance.options.autoslidedir == "left" && instance.curItem <= 0);
                        if (!islast || instance.options.loop || instance.options.loopslide) instance.parentObject.slideTimeout.start();
                    }
                }, 10);
                if (instance.options.onlyenableweblinkoncenter) {
                    $(".wonderplugin3dcarousel-item .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "default" });
                    $(".wonderplugin3dcarousel-item-current .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "pointer" });
                }
            },
            goAnimation: function (pos) {
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ "-webkit-transition": this.transition, "-moz-transition": this.transition, "-o-transition": this.transition, "-ms-transition": this.transition, transition: this.transition });
                items.removeClass("wonderplugin3dcarousel-item-visible");
                items.eq(this.curItem).css({ opacity: 1, visibility: "visible", "margin-left": "-" + this.itemW / 2 + "px" });
                items.eq(this.curItem).data("pos", 0).addClass("wonderplugin3dcarousel-item-visible");
                if (this.totalItems <= 1) return;
                for (var i = 1; i <= this.sideCount; i++) {
                    var sideItem = this.curItem - i;
                    if (sideItem < 0) {
                        if (!this.options.loop) break;
                        sideItem = this.totalItems + sideItem;
                    }
                    items.eq(sideItem).css({ opacity: 1, visibility: "visible", "margin-left": "-" + (this.itemW / 2 + this.itemW * i) + "px" });
                    items.eq(sideItem).data("pos", -i).addClass("wonderplugin3dcarousel-item-visible");
                }
                for (var i = 1; i <= this.sideCount; i++) {
                    var sideItem = this.curItem + i;
                    if (sideItem >= this.totalItems) {
                        if (!this.options.loop) break;
                        sideItem = sideItem - this.totalItems;
                    }
                    items.eq(sideItem).css({ opacity: 1, visibility: "visible", "margin-left": this.itemW / 2 + this.itemW * (i - 1) + "px" });
                    items.eq(sideItem).data("pos", i).addClass("wonderplugin3dcarousel-item-visible");
                }
                items.not(".wonderplugin3dcarousel-item-visible").css({ opacity: 0, visibility: "hidden" });
                if (this.totalItems <= this.visibleitems) return;
                if (pos < 0)
                    for (var i = 1; i <= Math.abs(pos); i++) {
                        var sideItem = this.curItem + this.sideCount + i;
                        if (sideItem >= this.totalItems) {
                            if (!this.options.loop) break;
                            sideItem = sideItem - this.totalItems;
                        }
                        if (!items.eq(sideItem).hasClass(".wonderplugin3dcarousel-item-visible")) items.eq(sideItem).css({ "margin-left": this.itemW / 2 + this.itemW * (i + this.sideCount - 1) + "px" });
                    }
                else
                    for (var i = 1; i <= Math.abs(pos); i++) {
                        var sideItem = this.curItem - this.sideCount - i;
                        if (sideItem < 0) {
                            if (!this.options.loop) break;
                            sideItem = this.totalItems + sideItem;
                        }
                        if (!items.eq(sideItem).hasClass(".wonderplugin3dcarousel-item-visible")) items.eq(sideItem).css({ "margin-left": "-" + (this.itemW / 2 + this.itemW * (i + this.sideCount)) + "px" });
                    }
            },
        };
        var ThreeDSlider = function (parentObject, container, options, id) {
            this.parentObject = parentObject;
            this.container = container;
            this.options = options;
            this.id = id;
            this.curItem = -1;
        };
        ThreeDSlider.prototype = {
            init: function () {
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ display: "block", opacity: 0, visibility: "hidden" });
                if (this.curItem < 0) this.curItem = this.options.firstitem;
                this.direction = 0;
                this.totalItems = items.length;
                this.initClickHandler();
                this.initSize();
                this.gotoItem(this.curItem);
            },
            resizeObject: function () {
                var screensize = this.parentObject.checkScreen();
                if (this.screenstatus != screensize) {
                    this.screenstatus = screensize;
                    this.initSize();
                    this.parentObject.resizeImages();
                    this.gotoItem(this.curItem);
                }
            },
            initSize: function () {
                this.screenstatus = this.parentObject.checkScreen();
                if (this.screenstatus == "small") {
                    this.visibleitems = this.options.small_visibleitems;
                    this.perspective = this.options.small_perspective;
                    this.xdis = this.options.small_xdis;
                    this.zdis = this.options.small_zdis;
                    this.yrotate = this.options.small_yrotate;
                    this.transition = this.options.small_transition;
                    this.itemW = this.options.small_width;
                    this.itemH = this.options.small_height;
                    this.carouselmargin = this.options.small_carouselmargin;
                } else if (this.screenstatus == "medium") {
                    this.visibleitems = this.options.medium_visibleitems;
                    this.perspective = this.options.medium_perspective;
                    this.xdis = this.options.medium_xdis;
                    this.zdis = this.options.medium_zdis;
                    this.yrotate = this.options.medium_yrotate;
                    this.transition = this.options.medium_transition;
                    this.itemW = this.options.medium_width;
                    this.itemH = this.options.medium_height;
                    this.carouselmargin = this.options.medium_carouselmargin;
                } else {
                    this.visibleitems = this.options.visibleitems;
                    this.perspective = this.options.perspective;
                    this.xdis = this.options.xdis;
                    this.zdis = this.options.zdis;
                    this.yrotate = this.options.yrotate;
                    this.transition = this.options.transition;
                    this.itemW = this.options.width;
                    this.itemH = this.options.height;
                    this.carouselmargin = this.options.carouselmargin;
                }
                this.itemImgW = this.itemW - 2 * this.options.itemborder;
                this.itemImgH = this.itemH - 2 * this.options.itemborder;
                this.sideCount = Math.floor((this.visibleitems - 1) / 2);
                this.container.css({ "box-sizing": "border-box" });
                this.container.find("*").css({ "box-sizing": "border-box" });
                $(".wonderplugin3dcarousel-list-container", this.container).css({ display: "block", position: "relative", width: "100%", height: "auto", overflow: "hidden", margin: 0, padding: this.carouselmargin });
                $(".wonderplugin3dcarousel-list", this.container).css({ width: "100%", height: this.itemH + "px", margin: 0, padding: 0 });
                $(".wonderplugin3dcarousel-list", this.container).css({ "transform-style": this.parentObject.isFirefox ? "flat" : "preserve-3d", perspective: this.perspective + "px" });
                $(".wonderplugin3dcarousel-item", this.container).css({ width: this.itemW + "px", position: "absolute", top: 0, left: "50%", "margin-left": "-" + this.itemW / 2 + "px" });
                $(".wonderplugin3dcarousel-content", this.container).css({ "background-color": this.options.itembgcolor, padding: this.options.itemborder + "px" });
                $(".wonderplugin3dcarousel-image", this.container).css({ display: "block", position: "relative", width: this.itemImgW + "px", height: this.itemImgH + "px", overflow: "hidden" });
                $(".wonderplugin3dcarousel-img-container", this.container).css({ display: "block", position: "relative", width: "100%", "max-width": "100%", height: "100%", "max-height": "100%" });
                $(".wonderplugin3dcarousel-img", this.container).css({ display: "inline", "max-width": "100%", outline: "1px solid transparent" });
            },
            initClickHandler: function () {
                var instance = this;
                $(".wonderplugin3dcarousel-item", this.container).click(function () {
                    if ($(this).index() == instance.curItem) return;
                    var disableWeblink = instance.options.onlyenableweblinkoncenter && $(this).find(".wonderplugin3dcarousel-item-weblink").length > 0 && $(this).index() != instance.curItem;
                    instance.gotoItem($(this).index());
                    if (disableWeblink) return false;
                });
            },
            gotoPrev: function () {
                var itemId = this.curItem - 1;
                if (itemId < 0) itemId = this.options.loop || this.options.loopslide ? this.totalItems - 1 : 0;
                this.direction = -1;
                this.gotoItem(itemId);
            },
            gotoNext: function () {
                var itemId = this.curItem + 1;
                if (itemId >= this.totalItems) itemId = this.options.loop || this.options.loopslide ? 0 : this.totalItems - 1;
                this.direction = 1;
                this.gotoItem(itemId);
            },
            gotoItem: function (itemId) {
                this.parentObject.slideTimeout.stop();
                this.prevItem = this.curItem;
                this.curItem = itemId;
                this.container.trigger("wonderplugin3dcarousel.beforeswitch", [this.prevItem, this.curItem]);
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ "-webkit-transition": "none", "-moz-transition": "none", "-o-transition": "none", "-ms-transition": "none", transition: "none" });
                items.removeClass("wonderplugin3dcarousel-item-current");
                items.eq(this.curItem).addClass("wonderplugin3dcarousel-item-current");
                if (this.options.pausevideonotinmiddle)
                    items.not(".wonderplugin3dcarousel-item-current").each(function () {
                        if ($(this).find("video").length > 0) $(this).find("video").get(0).pause();
                    });
                var pos = items.eq(this.curItem).data("pos");
                var dir = this.visibleitems == 1 ? this.direction : pos;
                if (this.totalItems > this.visibleitems)
                    if (dir < 0)
                        for (var i = 0; i <= this.sideCount; i++) {
                            var sideItem = this.curItem - i;
                            if (sideItem < 0) {
                                if (!this.options.loop) break;
                                sideItem = this.totalItems + sideItem;
                            }
                            items.eq(sideItem).css({ transform: "translateX(-" + this.xdis * (i - dir) + "px) translateZ(-" + this.zdis * (i - dir) + "px) rotateY(" + this.yrotate + "deg)" });
                        }
                    else if (dir > 0)
                        for (var i = 0; i <= this.sideCount; i++) {
                            var sideItem = this.curItem + i;
                            if (sideItem >= this.totalItems) {
                                if (!this.options.loop) break;
                                sideItem = sideItem - this.totalItems;
                            }
                            items.eq(sideItem).css({ transform: "translateX(" + this.xdis * (i + dir) + "px) translateZ(-" + this.zdis * (i + dir) + "px) rotateY(-" + this.yrotate + "deg)" });
                        }
                var instance = this;
                setTimeout(function () {
                    instance.goAnimation(dir);
                    instance.container.trigger("wonderplugin3dcarousel.switch", [instance.prevItem, instance.curItem]);
                    if (instance.parentObject.autosliding && !instance.parentObject.isMousePaused && !instance.parentObject.isVideoPaused) {
                        var islast = (instance.options.autoslidedir == "right" && instance.curItem >= instance.totalItems - 1) || (instance.options.autoslidedir == "left" && instance.curItem <= 0);
                        if (!islast || instance.options.loop || instance.options.loopslide) instance.parentObject.slideTimeout.start();
                    }
                }, 10);
                if (instance.options.onlyenableweblinkoncenter) {
                    $(".wonderplugin3dcarousel-item .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "default" });
                    $(".wonderplugin3dcarousel-item-current .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "pointer" });
                }
            },
            goAnimation: function (pos) {
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ "-webkit-transition": this.transition, "-moz-transition": this.transition, "-o-transition": this.transition, "-ms-transition": this.transition, transition: this.transition });
                items.removeClass("wonderplugin3dcarousel-item-visible");
                items.eq(this.curItem).css({ opacity: 1, visibility: "visible", "z-index": (this.sideCount + 1) * 2, transform: "translateX(0px) translateZ(0px) rotateY(0deg)" });
                items.eq(this.curItem).data("pos", 0).addClass("wonderplugin3dcarousel-item-visible");
                if (this.totalItems <= 1) return;
                for (var i = 1; i <= this.sideCount; i++) {
                    var sideItem = this.curItem - i;
                    if (sideItem < 0) {
                        if (!this.options.loop) break;
                        sideItem = this.totalItems + sideItem;
                    }
                    items
                        .eq(sideItem)
                        .css({ opacity: 1, visibility: "visible", "z-index": (this.sideCount - i + 1) * 2 - 1, transform: "translateX(-" + this.xdis * i + "px) translateZ(-" + this.zdis * i + "px) rotateY(" + this.yrotate + "deg)" });
                    items.eq(sideItem).data("pos", -i).addClass("wonderplugin3dcarousel-item-visible");
                }
                for (var i = 1; i <= this.sideCount; i++) {
                    var sideItem = this.curItem + i;
                    if (sideItem >= this.totalItems) {
                        if (!this.options.loop) break;
                        sideItem = sideItem - this.totalItems;
                    }
                    items
                        .eq(sideItem)
                        .css({ opacity: 1, visibility: "visible", "z-index": (this.sideCount - i + 1) * 2, transform: "translateX(" + this.xdis * i + "px) translateZ(-" + this.zdis * i + "px) rotateY(-" + this.yrotate + "deg)" });
                    items.eq(sideItem).data("pos", i).addClass("wonderplugin3dcarousel-item-visible");
                }
                items.not(".wonderplugin3dcarousel-item-visible").css({ opacity: 0, visibility: "hidden", "z-index": 0 });
                if (this.totalItems <= this.visibleitems) return;
                if (pos < 0)
                    for (var i = 1; i <= Math.abs(pos); i++) {
                        var sideItem = this.curItem + this.sideCount + i;
                        if (sideItem >= this.totalItems) {
                            if (!this.options.loop) break;
                            sideItem = sideItem - this.totalItems;
                        }
                        if (!items.eq(sideItem).hasClass(".wonderplugin3dcarousel-item-visible"))
                            items.eq(sideItem).css({ "z-index": -i, transform: "translateX(" + this.xdis * (i + this.sideCount) + "px) translateZ(-" + this.zdis * (i + this.sideCount) + "px) rotateY(-" + this.yrotate + "deg)" });
                    }
                else
                    for (var i = 1; i <= Math.abs(pos); i++) {
                        var sideItem = this.curItem - this.sideCount - i;
                        if (sideItem < 0) {
                            if (!this.options.loop) break;
                            sideItem = this.totalItems + sideItem;
                        }
                        if (!items.eq(sideItem).hasClass(".wonderplugin3dcarousel-item-visible"))
                            items.eq(sideItem).css({ "z-index": -i, transform: "translateX(-" + this.xdis * (i + this.sideCount) + "px) translateZ(-" + this.zdis * (i + this.sideCount) + "px) rotateY(" + this.yrotate + "deg)" });
                    }
            },
        };
        var ThreeDCarousel = function (parentObject, container, options, id) {
            this.parentObject = parentObject;
            this.container = container;
            this.options = options;
            this.id = id;
            this.curItem = -1;
        };
        ThreeDCarousel.prototype = {
            init: function () {
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.css({ display: "block", "backface-visibility": "visible" });
                this.totalItems = items.length;
                this.initClickHandler();
                if (this.curItem < 0) this.curItem = this.options.firstitem;
                this.initSize();
                this.gotoItem(this.curItem);
            },
            initSize: function () {
                this.screenstatus = this.parentObject.checkScreen();
                if (this.screenstatus == "small") {
                    this.carouselmargin = this.options.small_carouselmargin;
                    this.transition = this.options.small_transition;
                    this.itemW = this.options.small_width;
                    this.itemH = this.options.small_height;
                } else if (this.screenstatus == "medium") {
                    this.carouselmargin = this.options.medium_carouselmargin;
                    this.transition = this.options.medium_transition;
                    this.itemW = this.options.medium_width;
                    this.itemH = this.options.medium_height;
                } else {
                    this.carouselmargin = this.options.carouselmargin;
                    this.transition = this.options.transition;
                    this.itemW = this.options.width;
                    this.itemH = this.options.height;
                }
                this.perspective = this.options.perspective;
                this.itemImgW = this.itemW - 2 * this.options.itemborder;
                this.itemImgH = this.itemH - 2 * this.options.itemborder;
                this.container.css({ "box-sizing": "border-box" });
                this.container.find("*").css({ "box-sizing": "border-box" });
                $(".wonderplugin3dcarousel-list", this.container).css({ "transform-style": this.parentObject.isFirefox ? "flat" : "preserve-3d", perspective: this.perspective + "px" });
                $(".wonderplugin3dcarousel-list-container", this.container).css({ display: "block", position: "relative", width: "100%", height: "auto", overflow: "hidden", margin: 0, padding: this.carouselmargin });
                $(".wonderplugin3dcarousel-list", this.container).css({ width: "100%", height: this.itemH + "px", margin: 0, padding: 0 });
                $(".wonderplugin3dcarousel-item", this.container).css({ width: this.itemW + "px", position: "absolute", top: 0, left: "50%", "margin-left": "-" + this.itemW / 2 + "px", transition: this.transition });
                $(".wonderplugin3dcarousel-content", this.container).css({ "background-color": this.options.itembgcolor, padding: this.options.itemborder + "px" });
                $(".wonderplugin3dcarousel-image", this.container).css({ display: "block", position: "relative", width: this.itemImgW + "px", height: this.itemImgH + "px", overflow: "hidden" });
                $(".wonderplugin3dcarousel-img-container", this.container).css({ display: "block", position: "relative", width: "100%", "max-width": "100%", height: "100%", "max-height": "100%" });
                $(".wonderplugin3dcarousel-img", this.container).css({ display: "inline", "max-width": "100%", outline: "1px solid transparent" });
            },
            resizeObject: function () {
                var screensize = this.parentObject.checkScreen();
                if (this.screenstatus != screensize) {
                    this.screenstatus = screensize;
                    this.initSize();
                }
                this.gotoItem(this.curItem);
            },
            initClickHandler: function () {
                var instance = this;
                $(".wonderplugin3dcarousel-item", this.container).click(function () {
                    var disableWeblink = instance.options.onlyenableweblinkoncenter && $(this).find(".wonderplugin3dcarousel-item-weblink").length > 0 && $(this).index() != instance.curItem;
                    instance.gotoItem($(this).index());
                    if (disableWeblink) return false;
                });
            },
            gotoPrev: function () {
                var itemId = this.curItem - 1;
                if (itemId < 0) itemId = this.options.loop || this.options.loopslide ? this.totalItems - 1 : 0;
                this.gotoItem(itemId);
            },
            gotoNext: function () {
                var itemId = this.curItem + 1;
                if (itemId >= this.totalItems) itemId = this.options.loop || this.options.loopslide ? 0 : this.totalItems - 1;
                this.gotoItem(itemId);
            },
            gotoItem: function (itemId) {
                var instance = this;
                this.parentObject.slideTimeout.stop();
                this.prevItem = this.curItem;
                this.curItem = itemId;
                this.container.trigger("wonderplugin3dcarousel.beforeswitch", [this.prevItem, this.curItem]);
                var items = $(".wonderplugin3dcarousel-item", this.container);
                items.removeClass("wonderplugin3dcarousel-item-current");
                items.eq(this.curItem).addClass("wonderplugin3dcarousel-item-current");
                if (this.options.pausevideonotinmiddle)
                    items.not(".wonderplugin3dcarousel-item-current").each(function () {
                        if ($(this).find("video").length > 0) $(this).find("video").get(0).pause();
                    });
                items.css({ transition: this.transition });
                this.angle = 180 / this.totalItems;
                this.axisd = (this.itemW + this.options.itemspace) / 2 / Math.tan((this.angle * Math.PI) / 180);
                this.carouselWidth = 0;
                items.each(function (index) {
                    var pos = index - instance.curItem;
                    if (pos < 0) pos += instance.parentObject.elemLength;
                    var xdis = 2 * instance.axisd * Math.sin((pos * instance.angle * Math.PI) / 180) * Math.cos((pos * instance.angle * Math.PI) / 180);
                    var zdis = -2 * instance.axisd * Math.sin((pos * instance.angle * Math.PI) / 180) * Math.sin((pos * instance.angle * Math.PI) / 180);
                    var ydis = zdis * Math.sin((-instance.options.rotatex * Math.PI) / 180);
                    if (instance.carouselWidth < Math.abs(xdis)) instance.carouselWidth = Math.abs(xdis);
                    var rotatey = 0;
                    if (instance.options.facemode == "circle") {
                        rotatey = instance.angle * 2 * pos;
                        if (typeof $(this).data("rotatey") !== "undefined") {
                            var r0 = $(this).data("rotatey");
                            while (Math.abs(rotatey - r0) > 180)
                                if (rotatey > r0) rotatey -= 360;
                                else rotatey += 360;
                        }
                    }
                    $(this).css({
                        transform: "translateX(" + xdis + "px) translateY(" + ydis + "px) translateZ(" + zdis + "px) rotateX(" + instance.options.rotatex + "deg) rotateY(" + rotatey + "deg)",
                        "z-index": pos <= instance.parentObject.elemLength / 2 ? Math.ceil(instance.parentObject.elemLength / 2 - pos) * 2 : Math.ceil(pos - instance.parentObject.elemLength / 2) * 2 - 1,
                    });
                    $(this).data("translatex", xdis).data("translatey", ydis).data("translatez", zdis).data("rotatex", instance.options.rotatex).data("rotatey", rotatey);
                });
                this.carouselWidth *= 2;
                if (this.options.facemode == "front") this.carouselWidth += this.itemW;
                this.containerWidth = this.container.width();
                var scale = this.containerWidth > 0 && this.carouselWidth > this.containerWidth ? this.containerWidth / this.carouselWidth : 1;
                scale *= this.options.scaleratio / 1.2;
                $(".wonderplugin3dcarousel-list", this.container).css({ transform: "scale(" + scale + ")" });
                this.container.trigger("wonderplugin3dcarousel.switch", [this.prevItem, this.curItem]);
                if (instance.parentObject.autosliding && !instance.parentObject.isMousePaused && !instance.parentObject.isVideoPaused) instance.parentObject.slideTimeout.start();
                if (instance.options.onlyenableweblinkoncenter) {
                    $(".wonderplugin3dcarousel-item .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "default" });
                    $(".wonderplugin3dcarousel-item-current .wonderplugin3dcarousel-item-weblink", instance.container).css({ cursor: "pointer" });
                }
            },
        };
        var WP3DCarousel = function (container, options, id, lightboxObject) {
            this.container = container;
            this.options = options;
            this.id = id;
            this.lightboxObject = lightboxObject;
            this.resizeTimeout = null;
            this.screenstatus = "normal";
            this.preProcess(this);
        };
        WP3DCarousel.prototype = {
            initData: function () {
                this.init();
            },
            init: function () {
                var instance = this;
                this.initEnv();
                this.container.css({ width: "100%" });
                this.elemArray = $(".wonderplugin3dcarousel-item", this.container);
                this.elemLength = this.elemArray.length;
                if (this.options.random) {
                    for (var i = this.elemLength - 1; i > 0; i--) {
                        var index = Math.floor(Math.random() * i);
                        this.elemArray.eq(index).insertBefore(this.elemArray.eq(i));
                        this.elemArray.eq(i).insertBefore(this.elemArray.eq(index));
                    }
                    this.elemArray = $(".wonderplugin3dcarousel-item", this.container);
                }
                this.initWM();
                this.initAutoSlide();
                this.legacyMode = false;
                if (this.isIE6 || this.isIE7 || this.isIE8 || this.isIE9 || this.options.legacymode) this.legacyMode = true;
                if (this.legacyMode) this.carouselObject = new LegacyCarousel(this, this.container, this.options, this.id);
                else
                    switch (this.options.template) {
                        case "3dcarousel":
                            this.carouselObject = new ThreeDCarousel(this, this.container, this.options, this.id);
                            break;
                        default:
                            this.carouselObject = new ThreeDSlider(this, this.container, this.options, this.id);
                            break;
                    }
                this.initPlayVideo();
                this.initOverlay();
                this.createText();
                this.createArrows();
                this.enableSwipe();
                this.createBullets();
                this.initLightbox();
                this.carouselObject.init();
                this.resizeImages();
                $(window).resize(function () {
                    clearTimeout(instance.resizeTimeout);
                    instance.resizeTimeout = setTimeout(function () {
                        instance.resizeCarousel();
                    }, 50);
                });
                this.container.css({ display: "block" });
            },
            preProcess: function (instance) {
                var found = false;
                var item_index = 0;
                var youtubeapikey = "";
                var youtubeplaylistid = "";
                var youtubeplaylistmaxresults = "";
                $(".wonderplugin3dcarousel-item", this.container).each(function (index) {
                    if ($(this).data("youtubeapikey")) {
                        youtubeapikey = $(this).data("youtubeapikey");
                        youtubeplaylistid = $(this).data("youtubeplaylistid");
                        youtubeplaylistmaxresults = $(this).data("youtubeplaylistmaxresults");
                        item_index = index;
                        found = true;
                        return false;
                    }
                });
                if (found) instance.getYouTubePlaylist(youtubeapikey, youtubeplaylistid, youtubeplaylistmaxresults, item_index, item_index, instance.preProcess, instance, null);
                else instance.initData();
            },
            getYouTubePlaylist: function (youtubeapikey, youtubeplaylistid, youtubeplaylistmaxresults, index, insert_index, onsuccess, instance, pagetoken) {
                var youtube_url = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&playlistId=" + youtubeplaylistid + "&key=" + youtubeapikey;
                if (youtubeplaylistmaxresults)
                    if (youtubeplaylistmaxresults > 50) youtube_url += "&maxResults=50";
                    else youtube_url += "&maxResults=" + youtubeplaylistmaxresults;
                if (pagetoken) youtube_url += "&pageToken=" + pagetoken;
                var all_done = true;
                $.getJSON(youtube_url, function (data) {
                    if (data && data.items) {
                        var original_item = $(".wonderplugin3dcarousel-item", instance.container).eq(index);
                        for (var i = 0; i < data.items.length; i++) {
                            var video_id = data.items[i]["snippet"]["resourceId"]["videoId"];
                            var thumbnail = "https://img.youtube.com/vi/" + video_id + "/0.jpg";
                            var image = "https://img.youtube.com/vi/" + video_id + "/0.jpg";
                            if (data.items[i]["snippet"]["thumbnails"] && data.items[i]["snippet"]["thumbnails"]["maxres"]) image = data.items[i]["snippet"]["thumbnails"]["maxres"]["url"];
                            var video = "https://www.youtube.com/embed/" + video_id;
                            var title = data.items[i]["snippet"]["title"];
                            var description = data.items[i]["snippet"]["description"];
                            var new_item = original_item.clone();
                            new_item.removeAttr("data-youtubeapikey").removeAttr("data-youtubeplaylistid").removeAttr("data-youtubeplaylistmaxresults");
                            var item_html = new_item
                                .html()
                                .replace(/data-srcyt=/g, "src=")
                                .replace(/__IMAGE__/g, image)
                                .replace(/__THUMBNAIL__/g, thumbnail)
                                .replace(/__VIDEO__/g, video)
                                .replace(/__TITLE__/g, title)
                                .replace(/__DESCRIPTION__/g, description);
                            item_html = item_html.replace(/data-href=/g, "href=");
                            new_item.html(item_html);
                            if (instance.options.lightboxobject && new_item.find("a").hasClass("html5lightbox"))
                                new_item.find("a").each(function () {
                                    instance.options.lightboxobject.push(this);
                                    $(this).off("click").click(instance.options.lightboxobject.clickHandler);
                                });
                            $(".wonderplugin3dcarousel-item", instance.container).eq(insert_index).after(new_item);
                            insert_index++;
                        }
                    }
                    if (data && data.nextPageToken && youtubeplaylistmaxresults && youtubeplaylistmaxresults > 50) {
                        all_done = false;
                        instance.getYouTubePlaylist(youtubeapikey, youtubeplaylistid, youtubeplaylistmaxresults - 50, index, insert_index, onsuccess, instance, data.nextPageToken);
                    }
                }).always(function () {
                    if (all_done) {
                        $(".wonderplugin3dcarousel-item", instance.container).eq(index).remove();
                        onsuccess(instance);
                    }
                });
            },
            initWM: function () {
                if (!this.options.mtext) return;
                var instance = this;
                $(".wonderplugin3dcarousel-item", this.container).each(function (index) {
                    if (index % 3 == 1)
                        $(this).append(
                            '<a href="' +
                                instance.options.marklink +
                                '" target="_blank"><div style="display:block;visibility:visible;position:absolute;top:2px;left:2px;padding:2px 4px;border-radius:3px;-moz-border-radius:3px;-webkit-border-radius:3px;background-color:#eee;color:#333;font:12px Arial,sans-serif;">' +
                                instance.options.mark +
                                "</div></a>"
                        );
                });
            },
            checkScreen: function () {
                var screenstatus = "normal";
                var screenWidth = $(window).width();
                if (screenWidth <= this.options.small_screenwidth) screenstatus = "small";
                else if (screenWidth <= this.options.medium_screenwidth) screenstatus = "medium";
                return screenstatus;
            },
            initEnv: function () {
                this.isOpera = navigator.userAgent.match(/Opera/i) != null || navigator.userAgent.match(/OPR\//i) != null;
                this.isFirefox = navigator.userAgent.match(/Firefox/i) != null;
                this.isIE11 = navigator.userAgent.match(/Trident\/7/) != null && navigator.userAgent.match(/rv:11/) != null;
                this.isIE = navigator.userAgent.match(/MSIE/i) != null && !this.isOpera;
                this.isIE10 = navigator.userAgent.match(/MSIE 10/i) != null && !this.isOpera;
                this.isIE9 = navigator.userAgent.match(/MSIE 9/i) != null && !this.isOpera;
                this.isIE8 = navigator.userAgent.match(/MSIE 8/i) != null && !this.isOpera;
                this.isIE7 = navigator.userAgent.match(/MSIE 7/i) != null && !this.isOpera;
                this.isIE6 = navigator.userAgent.match(/MSIE 6/i) != null && !this.isOpera;
                this.isAndroid = navigator.userAgent.match(/Android/i) != null;
                if (this.isAndroid) {
                    var match = navigator.userAgent.match(/Android\s([0-9\.]*)/i);
                    this.androidVersion = match && match.length >= 2 ? parseInt(match[1], 10) : -1;
                }
                var v = document.createElement("video");
                this.canplaymp4 = v && v.canPlayType && v.canPlayType("video/mp4").replace(/no/, "");
                this.flashInstalled = false;
                try {
                    if (new ActiveXObject("ShockwaveFlash.ShockwaveFlash")) this.flashInstalled = true;
                } catch (e) {
                    if (navigator.mimeTypes["application/x-shockwave-flash"]) this.flashInstalled = true;
                }
            },
            initAutoSlide: function () {
                var instance = this;
                this.autosliding = false;
                this.isVideoPaused = false;
                this.isMousePaused = false;
                this.slideTimeout = new WP3DCarouselTimer(
                    instance.options.slideinterval,
                    function () {
                        if (instance.options.autoslidedir == "right") instance.gotoNext();
                        else instance.gotoPrev();
                    },
                    null
                );
                if (this.options.autoslide) this.autosliding = true;
                if (this.options.pauseonmouseover)
                    this.container.hover(
                        function () {
                            instance.isMousePaused = true;
                            instance.slideTimeout.stop();
                        },
                        function () {
                            instance.isMousePaused = false;
                            if (instance.autosliding && !instance.isVideoPaused) instance.slideTimeout.start();
                        }
                    );
            },
            initPlayVideo: function () {
                this.initVideoButton();
            },
            initVideoButton: function () {
                if (!this.options.showplayvideo) return;
                var instance = this;
                $(".wonderplugin3dcarousel-img", this.container).each(function (index) {
                    var isVideo = false;
                    var isLightboxVideo = false;
                    var videoUrl = "";
                    var videoWebmUrl = "";
                    if ($(this).data("video")) {
                        videoUrl = $(this).data("video");
                        if ($(this).data("videowebm")) videoWebmUrl = $(this).data("videowebm");
                        isVideo = true;
                    }
                    var lightboxLink = $(this).closest("a.wp3dcarousellightbox");
                    if (lightboxLink.length > 0) {
                        var type = instance.checkVideoType(lightboxLink.attr("href"));
                        if (type == TYPE_VIDEO_YOUTUBE || type == TYPE_VIDEO_VIMEO || type == TYPE_VIDEO_MP4 || type == TYPE_VIDEO_WEBM) isLightboxVideo = true;
                    }
                    if (instance.options.showplayvideo && (isVideo || isLightboxVideo))
                        $(this)
                            .closest(".wonderplugin3dcarousel-img-container")
                            .append(
                                '<div class="wonderplugin3dcarousel-playvideo" style="position:absolute;top:0;left:0;width:100%;height:100%;cursor:pointer;' +
                                    "background-image:url('" +
                                    instance.options.playvideoimage +
                                    "');" +
                                    "background-repeat:no-repeat;background-position:" +
                                    instance.options.playvideoposition +
                                    ";" +
                                    '"></div>'
                            );
                    if (isVideo)
                        $(this)
                            .closest(".wonderplugin3dcarousel-img-container")
                            .css({ cursor: "pointer" })
                            .click(function () {
                                if (!$(this).data("isplayvideo")) {
                                    $(this).data("isplayvideo", true);
                                    instance.playVideo($(this), videoUrl, videoWebmUrl);
                                }
                            });
                });
            },
            playVideo: function ($videoDiv, videoUrl, videoWebmUrl) {
                if (videoUrl.length <= 0) return;
                this.slideTimeout.stop();
                this.isVideoPaused = true;
                var type = this.checkVideoType(videoUrl);
                if (type == TYPE_VIDEO_YOUTUBE) this.playYoutubeVideo(videoUrl, $videoDiv);
                else if (type == TYPE_VIDEO_VIMEO) this.playVimeoVideo(videoUrl, $videoDiv);
                else if (type == TYPE_VIDEO_MP4) this.playMp4Video(videoUrl, videoWebmUrl, true, $videoDiv);
            },
            playMp4Video: function (href, webmhref, autoplay, $videoWrapper) {
                this.isHTML5 = true;
                if (this.isIE6 || this.isIE7 || this.isIE8 || this.isIE9) this.isHTML5 = false;
                if (this.isFirefox || this.isOpera) if (!this.canplaymp4 && !webmhref) this.isHTML5 = false;
                if (this.isHTML5) {
                    var videoSrc = href;
                    if (this.isFirefox || this.isOpera) if (webmhref) videoSrc = webmhref;
                    this.embedHTML5Video($videoWrapper, videoSrc, autoplay);
                } else {
                    this.htmlfolder = window.location.href.substr(0, window.location.href.lastIndexOf("/") + 1);
                    if (href.charAt(0) != "/" && href.substring(0, 5) != "http:" && href.substring(0, 6) != "https:") href = this.htmlfolder + href;
                    this.embedFlash($videoWrapper, "100%", "100%", this.options.jsfolder + "html5boxplayer.swf", "transparent", {
                        width: "100%",
                        height: "100%",
                        videofile: href,
                        hdfile: "",
                        ishd: "0",
                        autoplay: autoplay ? "1" : "0",
                        errorcss: ".wonderplugin3dcarousel-error{text-align:center;color:#ff0000;}",
                        id: this.id,
                        hidecontrols: "0",
                        hideplaybutton: "0",
                        defaultvolume: 1,
                    });
                }
            },
            embedHTML5Video: function ($container, src, autoPlay) {
                if (
                    (this.isFirefox && this.options.nativecontrolsonfirefox) ||
                    ((this.isIE || this.isIE11) && this.options.nativecontrolsonie) ||
                    (this.isIPhone && this.options.nativecontrolsoniphone) ||
                    (this.isIPad && this.options.nativecontrolsonipad) ||
                    (this.isAndroid && this.options.nativecontrolsonandroid)
                )
                    this.options.nativehtml5controls = true;
                if (this.isIPhone || this.isIPad || this.isAndroid) this.options.nativecontrolsonfullscreen = true;
                $container.html(
                    "<div class='wonderplugin3dcarousel-video-container-" +
                        this.id +
                        "' style='position:relative;display:block;width:100%;height:100%;'><video class='threed-inline-video' style='width:100%;height:100%;margin:0;padding:0;'" +
                        (this.options.nativehtml5controls && !this.options.videohidecontrols ? " controls='controls'" : "") +
                        (this.options.nativecontrolsnodownload ? " controlsList='nodownload'" : "") +
                        "></div>"
                );
                $("video", $container).get(0).setAttribute("src", src);
                if (autoPlay) $("video", $container).get(0).play();
            },
            embedFlash: function ($container, w, h, src, wmode, flashVars) {
                if (this.flashInstalled) {
                    var htmlOptions = { pluginspage: "https://www.adobe.com/go/getflashplayer", quality: "high", allowFullScreen: "true", allowScriptAccess: "always", type: "application/x-shockwave-flash" };
                    htmlOptions.width = w;
                    htmlOptions.height = h;
                    htmlOptions.src = src;
                    htmlOptions.wmode = wmode;
                    htmlOptions.flashVars = $.param(flashVars);
                    var htmlString = "";
                    for (var key in htmlOptions) htmlString += key + "=" + htmlOptions[key] + " ";
                    $container.html("<embed " + htmlString + "/>");
                } else
                    $container.html(
                        "<div class='wonderplugin3dcarousel-video-error' style='display:block;position:absolute;text-align:center;width:100%;height:100%;left:0px;top:0px;'><div>The required Adobe Flash Player plugin is not installed</div><br /><div style='display:block;position:relative;text-align:center;width:112px;height:33px;margin:0px auto;'><a href='https://www.adobe.com/go/getflashplayer'><img src='https://www.adobe.com/images/shared/download_buttons/get_flash_player.gif' alt='Get Adobe Flash player' width='112' height='33'></img></a></div>"
                    );
            },
            playYoutubeVideo: function (href, $videoWrapper) {
                var src = href + (href.indexOf("?") < 0 ? "?" : "&") + "autoplay=1&wmode=transparent&rel=0&autohide=1";
                $videoWrapper.html("<iframe width='100%' height='100%' src='" + src + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
            },
            playVimeoVideo: function (href, $videoWrapper) {
                var src = href + (href.indexOf("?") < 0 ? "?" : "&") + "autoplay=1&api=1";
                $videoWrapper.html("<iframe width='100%' height='100%' src='" + src + "' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>");
            },
            checkVideoType: function (href) {
                if (!href) return -1;
                if (href.match(/\.(flv)(.*)?$/i)) return TYPE_VIDEO_FLASH;
                if (href.match(/\.(mp4|m4v)(.*)?$/i)) return TYPE_VIDEO_MP4;
                if (href.match(/\.(ogv|ogg)(.*)?$/i)) return TYPE_VIDEO_OGG;
                if (href.match(/\.(webm)(.*)?$/i)) return TYPE_VIDEO_WEBM;
                if (href.match(/\:\/\/.*(youtube\.com)/i) || href.match(/\:\/\/.*(youtu\.be)/i)) return TYPE_VIDEO_YOUTUBE;
                if (href.match(/\:\/\/.*(vimeo\.com)/i)) return TYPE_VIDEO_VIMEO;
                return 0;
            },
            initOverlay: function () {
                var instance = this;
                if (this.options.addimgoverlay)
                    $(".wonderplugin3dcarousel-item", this.container).each(function () {
                        $(this).find(".wonderplugin3dcarousel-img").parent().append('<div class="wonderplugin3dcarousel-img-overlay"></div>');
                    });
                if (this.options.applylinktohoveroverlay) {
                    $(".wonderplugin3dcarousel-hoveroverlay", this.container).each(function () {
                        var imgContainer = $(this).parent().find(".wonderplugin3dcarousel-img-container");
                        if (imgContainer.length > 0 && imgContainer.parent().is("a")) $(this).css({ cursor: "pointer" });
                    });
                    $(".wonderplugin3dcarousel-hoveroverlay", this.container).click(function () {
                        $(this).parent().find(".wonderplugin3dcarousel-img").click();
                    });
                }
                $(".wonderplugin3dcarousel-item", this.container).each(function () {
                    if ($(".wonderplugin3dcarousel-hoveroverlay", this).length > 0) {
                        if ($(".wonderplugin3dcarousel-content", this).length > 0 && instance.options.imghovereffect == "flipy")
                            $(".wonderplugin3dcarousel-content", this).addClass("wonderplugin3dcarousel-" + instance.options.imghovereffect + "-out");
                        $(".wonderplugin3dcarousel-hoveroverlay", this).addClass("wonderplugin3dcarousel-" + instance.options.imghovereffect + "-in");
                    }
                });
            },
            initLightbox: function () {
                var instance = this;
                $(".wp3dcarousellightbox-" + this.id).each(function () {
                    var title = $(this).data("title") ? $(this).data("title") : $(this).attr("title");
                    var description = $(this).data("description");
                    var container = $(this).closest(".lightboxcontainer");
                    if (container.length > 0) {
                        if (container.find(".lightboxtitle").length > 0) title = container.find(".lightboxtitle").text();
                        if (container.find(".lightboxdescription").length > 0) description = container.find(".lightboxdescription").text();
                    }
                    instance.lightboxObject.addItemNoDuplicate(
                        $(this).attr("href"),
                        title,
                        $(this).data("group"),
                        $(this).data("width"),
                        $(this).data("height"),
                        $(this).data("webm"),
                        $(this).data("ogg"),
                        $(this).data("thumbnail"),
                        description,
                        $(this).data("mediatype")
                    );
                });
                $(".wp3dcarousellightbox-" + this.id).click(function () {
                    var index = $(this).closest(".wonderplugin3dcarousel-item").index();
                    if (index == instance.carouselObject.curItem || !instance.options.onlyenablelightboxoncenter) instance.lightboxObject.showItem($(this).attr("href"));
                    $(this).closest(".wonderplugin3dcarousel-item").trigger("click");
                    return false;
                });
                if (instance.options.onlyenablelightboxoncenter)
                    instance.container.on("wonderplugin3dcarousel.beforeswitch", function () {
                        $(".wp3dcarousellightbox-" + instance.id).each(function () {
                            var index = $(this).closest(".wonderplugin3dcarousel-item").index();
                            $(this).css({ cursor: index == instance.carouselObject.curItem ? "pointer" : "default" });
                            var playVideoButton = $(this).find(".wonderplugin3dcarousel-playvideo");
                            if (playVideoButton.length > 0) playVideoButton.css({ cursor: index == instance.carouselObject.curItem ? "pointer" : "default" });
                        });
                    });
            },
            resizeCarousel: function () {
                this.carouselObject.resizeObject();
            },
            resizeImgObj: function ($img) {
                var imgW = $img.data("rawwidth");
                var imgH = $img.data("rawheight");
                if (this.options.donotzoomin && imgW <= this.carouselObject.itemW && imgH <= this.carouselObject.itemH) {
                    $img.css({ "margin-left": this.carouselObject.itemW / 2 - imgW / 2 + "px", "margin-top": this.carouselObject.itemH / 2 - imgH / 2 + "px" });
                    return;
                }
                if (this.options.scalemode == "fit")
                    if (imgW / imgH > this.carouselObject.itemW / this.carouselObject.itemH) {
                        var margin = this.carouselObject.itemH / 2 - (this.carouselObject.itemW * imgH) / imgW / 2 + "px";
                        $img.css({ "max-width": "100%", "max-height": "none", width: "100%", height: "auto", "margin-left": 0, "margin-top": margin });
                        $img.siblings(".wonderplugin3dcarousel-img-overlay").css({ width: "100%", left: 0, right: 0, height: "auto", top: margin, bottom: margin });
                    } else {
                        var margin = this.carouselObject.itemW / 2 - (this.carouselObject.itemH * imgW) / imgH / 2 + "px";
                        $img.css({ "max-width": "100%", "max-height": "100%", width: "auto", height: "100%", "margin-left": margin, "margin-top": 0 });
                        $img.siblings(".wonderplugin3dcarousel-img-overlay").css({ width: "auto", left: margin, right: margin, height: "100%", top: 0, bottom: 0 });
                    }
                else if (imgW / imgH > this.carouselObject.itemW / this.carouselObject.itemH)
                    $img.css({ "max-width": "none", "max-height": "100%", width: "auto", height: "100%", "margin-left": this.carouselObject.itemW / 2 - (this.carouselObject.itemH * imgW) / imgH / 2 + "px", "margin-top": 0 });
                else $img.css({ "max-width": "100%", "max-height": "none", width: "100%", height: "auto", "margin-left": 0, "margin-top": this.carouselObject.itemH / 2 - (this.carouselObject.itemW * imgH) / imgW / 2 + "px" });
            },
            resizeImages: function () {
                var instance = this;
                $(".wonderplugin3dcarousel-img", this.container)
                    .on("load", function () {
                        var imgWidth = $(this).get(0).naturalWidth ? $(this).get(0).naturalWidth : this.width;
                        var imgHeight = $(this).get(0).naturalHeight ? $(this).get(0).naturalHeight : this.height;
                        if (!$(this).attr("data-rawwidth")) $(this).data("rawwidth", imgWidth);
                        if (!$(this).attr("data-rawheight")) $(this).data("rawheight", imgHeight);
                        instance.resizeImgObj($(this));
                    })
                    .each(function () {
                        if (this.complete) $(this).trigger("load");
                    });
            },
            gotoPrev: function () {
                this.carouselObject.gotoPrev();
            },
            gotoNext: function () {
                this.carouselObject.gotoNext();
            },
            updateText: function (index) {
                $(".wonderplugin3dcarousel-title", this.container).empty();
                $(".wonderplugin3dcarousel-description", this.container).empty();
                $(".wonderplugin3dcarousel-button", this.container).empty();
                if (this.options.showtitle) {
                    var title = "";
                    if (this.elemArray.eq(index).find(".wonderplugin3dcarousel-item-text-title").length > 0) title = this.elemArray.eq(index).find(".wonderplugin3dcarousel-item-text-title").text();
                    else if (this.elemArray.eq(index).data("title")) title = this.elemArray.eq(index).data("title");
                    else if (this.elemArray.eq(index).attr("title")) title = this.elemArray.eq(index).attr("title");
                    if (title) $(".wonderplugin3dcarousel-title", this.container).html(title);
                }
                if (this.options.showdescription) {
                    var description = "";
                    if (this.elemArray.eq(index).find(".wonderplugin3dcarousel-item-text-description").length > 0) description = this.elemArray.eq(index).find(".wonderplugin3dcarousel-item-text-description").text();
                    else if (this.elemArray.eq(index).data("description")) description = this.elemArray.eq(index).data("description");
                    if (description) $(".wonderplugin3dcarousel-description", this.container).html(description);
                }
                if (this.options.showbutton) {
                    var itembutton = this.elemArray.eq(index).find(".wonderplugin3dcarousel-item-button");
                    if (itembutton.length) $(".wonderplugin3dcarousel-button", this.container).append(itembutton.clone(true).show());
                }
                this.container.trigger("wonderplugin3dcarousel.textupdated", [this.curItem]);
            },
            createText: function () {
                if (this.options.textstyle == "none") return;
                var carouselText = $('<div class="wonderplugin3dcarousel-text"></div>').appendTo(this.container);
                if (this.options.showtitle) carouselText.append('<div class="wonderplugin3dcarousel-title"></div>');
                if (this.options.showdescription) carouselText.append('<div class="wonderplugin3dcarousel-description"></div>');
                if (this.options.showbutton) carouselText.append('<div class="wonderplugin3dcarousel-button"></div>');
                var instance = this;
                this.container.on("wonderplugin3dcarousel.switch", function (e, prev, cur) {
                    if (cur >= 0 && cur < instance.elemLength)
                        if (instance.options.texteffect == "fade")
                            $(".wonderplugin3dcarousel-text", instance.container).fadeOut(function () {
                                instance.updateText(cur);
                                $(".wonderplugin3dcarousel-text", instance.container).fadeIn();
                            });
                        else instance.updateText(cur);
                });
            },
            enableSwipe: function () {
                if (this.options.enabletouchswipe) {
                    var instance = this;
                    var preventDefault = instance.isAndroid && instance.androidVersion >= 0 && instance.androidVersion <= 5 ? true : false;
                    $(".wonderplugin3dcarousel-list-container", this.container).threedCarouselTouchSwipe({
                        preventWebBrowser: preventDefault,
                        swipeLeft: function () {
                            $(window).trigger("wonderplugin3dcarousel.swipe", [instance.id, instance.carouselObject.curItem, "left"]);
                            instance.gotoNext();
                        },
                        swipeRight: function () {
                            $(window).trigger("wonderplugin3dcarousel.swipe", [instance.id, instance.carouselObject.curItem, "right"]);
                            instance.gotoPrev();
                        },
                    });
                }
            },
            createArrows: function () {
                if (this.options.arrowstyle == "none") return;
                var instance = this;
                var buttonCode = '<div class="wonderplugin3dcarousel-prev"></div><div class="wonderplugin3dcarousel-next"></div>';
                if (this.options.arrowsinsidelist) $(".wonderplugin3dcarousel-list-container", this.container).append(buttonCode);
                else this.container.append(buttonCode);
                var $prevArrow = $(".wonderplugin3dcarousel-prev", this.container);
                var $nextArrow = $(".wonderplugin3dcarousel-next", this.container);
                if (this.options.arrowpos == "bottom") {
                    $prevArrow.css({ position: "absolute", top: "100%", right: "50%", "margin-right": "4px" });
                    $nextArrow.css({ position: "absolute", top: "100%", left: "50%", "margin-left": "4px" });
                } else {
                    $prevArrow.css({ position: "absolute", top: "50%", "margin-top": "-" + this.options.arrowheight / 2 + "px", left: 0 });
                    $nextArrow.css({ position: "absolute", top: "50%", "margin-top": "-" + this.options.arrowheight / 2 + "px", right: 0 });
                }
                $prevArrow.css({
                    overflow: "hidden",
                    position: "absolute",
                    cursor: "pointer",
                    width: this.options.arrowwidth + "px",
                    height: this.options.arrowheight + "px",
                    background: 'url("' + this.options.arrowimage + '") no-repeat left top',
                });
                $nextArrow.css({
                    overflow: "hidden",
                    position: "absolute",
                    cursor: "pointer",
                    width: this.options.arrowwidth + "px",
                    height: this.options.arrowheight + "px",
                    background: 'url("' + this.options.arrowimage + '") no-repeat right top',
                });
                $prevArrow.hover(
                    function () {
                        $(this).css({ "background-position": "left bottom" });
                    },
                    function () {
                        $(this).css({ "background-position": "left top" });
                    }
                );
                $nextArrow.hover(
                    function () {
                        $(this).css({ "background-position": "right bottom" });
                    },
                    function () {
                        $(this).css({ "background-position": "right top" });
                    }
                );
                if (this.options.arrowstyle == "always") {
                    $prevArrow.css({ display: "block" });
                    $nextArrow.css({ display: "block" });
                } else {
                    $prevArrow.css({ display: "none" });
                    $nextArrow.css({ display: "none" });
                    this.container.hover(
                        function () {
                            if (instance.options.arrowanimation == "slide") {
                                $prevArrow
                                    .finish()
                                    .css({ display: "block", opaticy: 0, "margin-left": "-" + instance.options.arrowwidth / 2 + "px" })
                                    .animate({ opacity: 1, "margin-left": 0 }, 300);
                                $nextArrow
                                    .finish()
                                    .css({ display: "block", opaticy: 0, "margin-right": "-" + instance.options.arrowwidth / 2 + "px" })
                                    .animate({ opacity: 1, "margin-right": 0 }, 300);
                            } else {
                                $prevArrow.fadeIn(300);
                                $nextArrow.fadeIn(300);
                            }
                        },
                        function () {
                            if (instance.options.arrowanimation == "slide") {
                                $prevArrow.finish().animate({ opacity: 0, "margin-left": "-" + instance.options.arrowwidth / 2 + "px" }, 300, function () {
                                    $(this).css({ display: "none" });
                                });
                                $nextArrow.finish().animate({ opacity: 0, "margin-right": "-" + instance.options.arrowwidth / 2 + "px" }, 300, function () {
                                    $(this).css({ display: "none" });
                                });
                            } else {
                                $prevArrow.fadeOut(300);
                                $nextArrow.fadeOut(300);
                            }
                        }
                    );
                }
                $prevArrow.click(function () {
                    $(window).trigger("wonderplugin3dcarousel.arrowclicked", [instance.id, instance.carouselObject.curItem, "left"]);
                    instance.gotoPrev();
                });
                $nextArrow.click(function () {
                    $(window).trigger("wonderplugin3dcarousel.arrowclicked", [instance.id, instance.carouselObject.curItem, "right"]);
                    instance.gotoNext();
                });
                this.container.on("wonderplugin3dcarousel.switch", function (e, prev, cur) {
                    if (!instance.options.loop && !instance.options.loopside) {
                        $(".wonderplugin3dcarousel-prev", instance.container).css({ visibility: cur == 0 ? "hidden" : "visible" });
                        $(".wonderplugin3dcarousel-next", instance.container).css({ visibility: cur == instance.elemLength - 1 ? "hidden" : "visible" });
                    }
                });
            },
            createBullet: function (index) {
                var instance = this;
                var bullet = $('<div class="wonderplugin3dcarousel-bullet" data-bulletindex=' + index + "></div>");
                if (this.options.navstyle == "numbering") {
                    bullet.html(String(index + 1));
                    bullet.css({
                        display: "inline-block",
                        width: this.options.navwidth,
                        height: this.options.navheight,
                        cursor: "pointer",
                        font: this.options.navnumberingfont,
                        "line-height": this.options.navheight + "px",
                        color: this.options.navnumberingcolor,
                        "background-color": this.options.navnumberingbgcolor,
                        "text-align": "center",
                        margin: 0,
                        padding: 0,
                        border: 0,
                        "margin-left": index == 0 ? 0 : this.options.navspacing,
                    });
                    if (this.options.navnumberingbground) bullet.css({ "border-radius": Math.round(this.options.navheight / 2) + "px" });
                } else
                    bullet.css({
                        display: "inline-block",
                        width: this.options.navwidth,
                        height: this.options.navheight,
                        cursor: "pointer",
                        "background-image": 'url("' + this.options.navimage + '")',
                        "background-repeat": "no-repeat",
                        "background-position": "left top",
                        margin: 0,
                        padding: 0,
                        border: 0,
                        "margin-left": index == 0 ? 0 : this.options.navspacing,
                    });
                bullet.hover(
                    function () {
                        instance.bulletHighlight($(this));
                    },
                    function () {
                        instance.bulletNormal($(this));
                    }
                );
                bullet.click(function () {
                    instance.carouselObject.gotoItem($(this).data("bulletindex"));
                });
                return bullet;
            },
            bulletNormal: function (bullet) {
                if (this.carouselObject.curItem == bullet.data("bulletindex")) return;
                if (this.options.navstyle == "numbering") bullet.css({ color: this.options.navnumberingcolor, "background-color": this.options.navnumberingbgcolor });
                else bullet.css({ "background-position": "left top" });
            },
            bulletHighlight: function (bullet) {
                if (this.options.navstyle == "numbering") bullet.css({ color: this.options.navnumberingcolorhighlight, "background-color": this.options.navnumberingbgcolorhighlight });
                else bullet.css({ "background-position": "left bottom" });
            },
            createBullets: function () {
                if (this.options.navstyle == "none") return;
                var instance = this;
                var nav = $('<div class="wonderplugin3dcarousel-nav"></div>').appendTo(this.container);
                var bulletWrapper = $('<div class="wonderplugin3dcarousel-bullet-wrapper"></div>').appendTo(nav);
                var bulletList = $('<div class="wonderplugin3dcarousel-bullet-list"></div>').appendTo(bulletWrapper);
                bulletWrapper.css({ display: "block", position: "relative", "text-align": "center" });
                bulletList.css({ display: "inline-block", position: "relative", margin: "0 auto" });
                for (var i = 0; i < this.elemLength; i++) {
                    var bullet = this.createBullet(i);
                    bulletList.append(bullet);
                }
                this.container.on("wonderplugin3dcarousel.switch", function (e, prev, cur) {
                    var bullets = $(".wonderplugin3dcarousel-bullet", instance.container);
                    if (prev != cur && prev >= 0) instance.bulletNormal(bullets.eq(prev));
                    if (cur >= 0) instance.bulletHighlight(bullets.eq(cur));
                });
            },
        };
        options = options || {};
        for (var key in options)
            if (key.toLowerCase() !== key) {
                options[key.toLowerCase()] = options[key];
                delete options[key];
            }
        this.each(function () {
            if ($(this).data("donotinit") && (!options || !options["forceinit"])) return;
            if ($(this).data("inited")) return;
            $(this).data("inited", 1);
            var defaultOptions = {
                scalemode: "fill",
                donotzoomin: true,
                applylinktohoveroverlay: true,
                itembgcolor: "transparent",
                itemborder: 0,
                addimgoverlay: true,
                imghovereffect: "flipy",
                nativehtml5controls: true,
                videohidecontrols: false,
                nativecontrolsonfullscreen: true,
                nativecontrolsnodownload: true,
                nativecontrolsonfirefox: false,
                nativecontrolsonie: false,
                nativecontrolsoniphone: true,
                nativecontrolsonipad: true,
                nativecontrolsonandroid: true,
                pausevideonotinmiddle: true,
                carouselmargin: "48px 0",
                medium_carouselmargin: "48px 0",
                small_carouselmargin: "32px 0",
                textstyle: "always",
                showtitle: true,
                showdescription: true,
                showbutton: true,
                texteffect: "none",
                enabletouchswipe: true,
                arrowsinsidelist: true,
                arrowstyle: "mouseover",
                arrowpos: "side",
                arrowimage: "arrows-48-48-1.png",
                arrowwidth: 48,
                arrowheight: 48,
                arrowanimation: "slide",
                navstyle: "bullets",
                navwidth: 16,
                navheight: 16,
                navspacing: 8,
                navimage: "bullet-16-16-0.png",
                navnumberingfont: "normal 12px Arial",
                navnumberingcolor: "#666",
                navnumberingbgcolor: "#fff",
                navnumberingcolorhighlight: "#fff",
                navnumberingbgcolorhighlight: "#333",
                navnumberingbground: true,
                showplayvideo: true,
                playvideoimage: "playvideo-64-64-0.png",
                playvideoposition: "center center",
                autoslide: false,
                autoslidedir: "right",
                slideinterval: 5e3,
                pauseonmouseover: true,
                firstitem: 0,
                random: false,
                onlyenablelightboxoncenter: false,
                onlyenableweblinkoncenter: false,
                template: "3dslider",
                width: 400,
                height: 300,
                legacymode: false,
                loop: true,
                loopslide: false,
                visibleitems: 5,
                perspective: 2e3,
                xdis: 350,
                zdis: 200,
                yrotate: 45,
                transition: "all 0.5s ease-in-out",
                medium_screenwidth: 768,
                medium_width: 400,
                medium_height: 100,
                small_screenwidth: 414,
                small_width: 300,
                small_height: 200,
                medium_visibleitems: 3,
                medium_perspective: 1e3,
                medium_xdis: 350,
                medium_zdis: 200,
                medium_yrotate: 45,
                medium_transition: "all 0.5s ease-in-out",
                small_visibleitems: 1,
                small_perspective: 1e3,
                small_xdis: 200,
                small_zdis: 150,
                small_yrotate: 45,
                small_transition: "all 0.5s ease-in-out",
                facemode: "circle",
                itemspace: 8,
                rotatex: -8,
                scaleratio: 1.2,
                lightboxresponsive: true,
                lightboxshownavigation: true,
                lightboxshowtitle: true,
                lightboxshowdescription: false,
                lightboxfullscreenmode: false,
                lightboxcloseonoverlay: true,
                lightboxvideohidecontrols: false,
                lightboxtitlestyle: "bottom",
                lightboximagepercentage: 75,
                lightboxdefaultvideovolume: 1,
                lightboxoverlaybgcolor: "#000",
                lightboxoverlayopacity: 0.9,
                lightboxbgcolor: "#fff",
                lightboxtitleprefix: "%NUM / %TOTAL",
                lightboxtitleinsidecss: "color:#fff; font-size:16px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left;",
                lightboxdescriptioninsidecss: "color:#fff; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; margin:4px 0px 0px; padding: 0px;",
                lightboxthumbwidth: 90,
                lightboxthumbheight: 60,
                lightboxthumbtopmargin: 12,
                lightboxthumbbottommargin: 4,
                lightboxbarheight: 64,
                lightboxtitlebottomcss: "{color:#333; font-size:14px; font-family:Armata,sans-serif,Arial; overflow:hidden; text-align:left;}",
                lightboxdescriptionbottomcss: "{color:#333; font-size:12px; font-family:Arial,Helvetica,sans-serif; overflow:hidden; text-align:left; margin:4px 0px 0px; padding: 0px;}",
                lightboxautoslide: false,
                lightboxslideinterval: 5e3,
                lightboxshowtimer: true,
                lightboxtimerposition: "bottom",
                lightboxtimerheight: 2,
                lightboxtimercolor: "#dc572e",
                lightboxtimeropacity: 1,
                lightboxshowplaybutton: true,
                lightboxalwaysshownavarrows: false,
                lightboxbordersize: 8,
                lightboxshowtitleprefix: true,
                lightboxborderradius: 0,
                lightboximagekeepratio: true,
                lightboxshowsocial: false,
                lightboxsocialposition: "position:absolute;top:100%;right:0;",
                lightboxsocialpositionsmallscreen: "position:absolute;top:100%;right:0;left:0;",
                lightboxsocialdirection: "horizontal",
                lightboxsocialbuttonsize: 32,
                lightboxsocialbuttonfontsize: 18,
                lightboxsocialrotateeffect: true,
                lightboxshowfacebook: true,
                lightboxshowtwitter: true,
                lightboxshowpinterest: true,
                lightboxnavbgcolor: "rgba(0,0,0,0.2)",
                lightboxshownavcontrol: true,
                lightboxhidenavdefault: false,
            };
            this.options = $.extend({}, defaultOptions, options);
            var instance = this;
            $.each($(this).data(), function (key, value) {
                instance.options[key.toLowerCase()] = value;
            });
            this.options.mark = "";
            this.options.marklink = "";
            var imageList = ["arrowimage", "navimage", "playvideoimage"];
            for (var i = 0; i < imageList.length; i++)
                if (this.options[imageList[i]].substring(0, 7).toLowerCase() != "http://" && this.options[imageList[i]].substring(0, 8).toLowerCase() != "https://")
                    this.options[imageList[i]] = this.options.jsfolder + this.options[imageList[i]];
            this.options.mtext = true;
            var lightboxOptions = {
                responsive: this.options.lightboxresponsive,
                shownavigation: this.options.lightboxshownavigation,
                showtitle: this.options.lightboxshowtitle,
                showdescription: this.options.lightboxshowdescription,
                thumbwidth: this.options.lightboxthumbwidth,
                thumbheight: this.options.lightboxthumbheight,
                thumbtopmargin: this.options.lightboxthumbtopmargin,
                thumbbottommargin: this.options.lightboxthumbbottommargin,
                barheight: this.options.lightboxbarheight,
                titlebottomcss: this.options.lightboxtitlebottomcss,
                descriptionbottomcss: this.options.lightboxdescriptionbottomcss,
                fullscreenmode: this.options.lightboxfullscreenmode,
                closeonoverlay: this.options.lightboxcloseonoverlay,
                videohidecontrols: this.options.lightboxvideohidecontrols,
                titlestyle: this.options.lightboxtitlestyle,
                imagepercentage: this.options.lightboximagepercentage,
                defaultvideovolume: this.options.lightboxdefaultvideovolume,
                overlaybgcolor: this.options.lightboxoverlaybgcolor,
                overlayopacity: this.options.lightboxoverlayopacity,
                bgcolor: this.options.lightboxbgcolor,
                titleprefix: this.options.lightboxtitleprefix,
                titleinsidecss: this.options.lightboxtitleinsidecss,
                descriptioninsidecss: this.options.lightboxdescriptioninsidecss,
                autoslide: this.options.lightboxautoslide,
                slideinterval: this.options.lightboxslideinterval,
                showtimer: this.options.lightboxshowtimer,
                timerposition: this.options.lightboxtimerposition,
                timerheight: this.options.lightboxtimerheight,
                timercolor: this.options.lightboxtimercolor,
                timeropacity: this.options.lightboxtimeropacity,
                showplaybutton: this.options.lightboxshowplaybutton,
                alwaysshownavarrows: this.options.lightboxalwaysshownavarrows,
                bordersize: this.options.lightboxbordersize,
                showtitleprefix: this.options.lightboxshowtitleprefix,
                borderradius: this.options.lightboxborderradius,
                imagekeepratio: this.options.lightboximagekeepratio,
                showsocial: this.options.lightboxshowsocial,
                socialposition: this.options.lightboxsocialposition,
                socialpositionsmallscreen: this.options.lightboxsocialpositionsmallscreen,
                socialdirection: this.options.lightboxsocialdirection,
                socialbuttonsize: this.options.lightboxsocialbuttonsize,
                socialbuttonfontsize: this.options.lightboxsocialbuttonfontsize,
                socialrotateeffect: this.options.lightboxsocialrotateeffect,
                showfacebook: this.options.lightboxshowfacebook,
                showtwitter: this.options.lightboxshowtwitter,
                showpinterest: this.options.lightboxshowpinterest,
                navbgcolor: this.options.lightboxnavbgcolor,
                shownavcontrol: this.options.lightboxshownavcontrol,
                hidenavdefault: this.options.lightboxhidenavdefault,
            };
            if ($("#wp3dcarousellightbox_advanced_options").length)
                $.each($("#wp3dcarousellightbox_advanced_options").data(), function (key, value) {
                    lightboxOptions[key.toLowerCase()] = value;
                });
            if ($("#wp3dcarousellightbox_advanced_options_" + this.options.carouselid).length)
                $.each($("#wp3dcarousellightbox_advanced_options_" + this.options.carouselid).data(), function (key, value) {
                    lightboxOptions[key.toLowerCase()] = value;
                });
            var init3DCarousel = function (inst) {
                var lightboxObject = $("").wp3dcarousellightbox(lightboxOptions);
                wp3DCarouselLightboxObjects.addObject(lightboxObject);
                $(inst).data("lightboxobject", lightboxObject);
                var object = new WP3DCarousel($(inst), inst.options, inst.options.carouselid, lightboxObject);
                wp3DCarouselObjects.addObject(object);
                $(inst).data("object", object);
                $(inst).data("id", inst.options.carouselid);
            };
            init3DCarousel(this);
        });
    };
    $(document).ready(function () {
        $(".wonderplugin-3dcarousel-engine").css({ display: "none" });
        if ($.fn.wonderplugin3dcarousel) $(".wonderplugin3dcarousel").wonderplugin3dcarousel();
    });
})(jQuery);
(function ($) {
    $.fn.threedCarouselTouchSwipe = function (options) {
        var defaults = { preventWebBrowser: false, swipeLeft: null, swipeRight: null, swipeTop: null, swipeBottom: null };
        if (options) $.extend(defaults, options);
        return this.each(function () {
            var startX = -1,
                startY = -1;
            var curX = -1,
                curY = -1;
            function touchStart(event) {
                var e = event.originalEvent;
                if (e.targetTouches.length >= 1) {
                    startX = e.targetTouches[0].pageX;
                    startY = e.targetTouches[0].pageY;
                } else touchCancel(event);
            }
            function touchMove(event) {
                if (defaults.preventWebBrowser) event.preventDefault();
                var e = event.originalEvent;
                if (e.targetTouches.length >= 1) {
                    curX = e.targetTouches[0].pageX;
                    curY = e.targetTouches[0].pageY;
                } else touchCancel(event);
            }
            function touchEnd(event) {
                if (curX > 0 || curY > 0) {
                    triggerHandler();
                    touchCancel(event);
                } else touchCancel(event);
            }
            function touchCancel(event) {
                startX = -1;
                startY = -1;
                curX = -1;
                curY = -1;
            }
            function triggerHandler() {
                if (Math.abs(curX - startX) > Math.abs(curY - startY))
                    if (curX > startX) {
                        if (defaults.swipeRight) defaults.swipeRight.call();
                    } else {
                        if (defaults.swipeLeft) defaults.swipeLeft.call();
                    }
                else if (curY > startY) {
                    if (defaults.swipeBottom) defaults.swipeBottom.call();
                } else if (defaults.swipeTop) defaults.swipeTop.call();
            }
            try {
                $(this).on("touchstart", touchStart);
                $(this).on("touchmove", touchMove);
                $(this).on("touchend", touchEnd);
                $(this).on("touchcancel", touchCancel);
            } catch (e) {}
        });
    };
})(jQuery);
if (typeof wp3DCarouselLightboxObjects === "undefined")
    var wp3DCarouselLightboxObjects = new (function () {
        this.objects = [];
        this.addObject = function (obj) {
            this.objects.push(obj);
        };
    })();
if (typeof wp3DCarouselObjects === "undefined")
    var wp3DCarouselObjects = new (function () {
        this.objects = [];
        this.addObject = function (obj) {
            this.objects.push(obj);
        };
    })();
