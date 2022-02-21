<style>
#gap-1030431703 {
    padding-top: 30px;
}
#section_571098534 {
    padding-top: 30px;
    padding-bottom: 30px;
}
#section_571098534 .section-bg.bg-loaded {
    background-image: url(wp-content/uploads/2020/11/contact_form.png);
}

.wrap-contact100 {
    width: 800px;
    background: #fff;
    border-radius: 10px;
    overflow: hidden;
    padding: 72px 150px 25px 150px;
    box-shadow: 0 3px 20px 0px rgb(0 0 0 / 10%);
    -moz-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 3px 20px 0px rgb(0 0 0 / 10%);
    -o-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
    -ms-box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}

.container-contact100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    padding-top: 10px;
}

.contact100-form-btn {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    min-width: 160px;
    height: 42px;
    background-color: #0f58d0;
    border-radius: 21px;
    font-size: 14px;
    color: #fff;
    line-height: 1.2;
    text-transform: uppercase;
    padding-top: 5px;
    -webkit-transition: all 0.4s;
    -o-transition: all 0.4s;
    -moz-transition: all 0.4s;
    transition: all 0.4s;
}

.contact100-form-btn:hover {
    background-color: rgba(0, 174, 239, 0.7);
}

input.input100 {
    height: 62px;
    padding: 0 20px 0 23px;
}
.input100 {
    display: block;
    width: 100%;
    background: 0 0;
    font-size: 16px;
    color: #4b2354;
    line-height: 1.2;
}

.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 90px;
  height: 90px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

@media (max-width: 576px) {
.wrap-contact100 {
    padding: 72px 15px 25px;
}
.wrap-contact100 {
    width: auto;
}
}

</style>
<section class="section ss-tuvan" id="section_571098534">
    <div class="bg section-bg fill bg-fill  " ></div>
    <div class="section-content relative">
        <div class="row row-collapse"  id="row-907506895">
            <div id="col-182582710" class="col small-12 large-12"  >
                <div class="col-inner text-center"  >
                    <h2 class="title-main" style="text-align: center;margin-top: 20px;">
                        <span style="font-family: robotocondensed-b; font-size: 100%; color: #ffffff;">LIÊN HỆ TƯ VẤN</span>
                    </h2>
                    <p style="text-align: center;" data-cms="{{app()->getLocale()}}-form-contact-1">
                        <span style=" color: #ffffff;">Chúng tôi luôn tư vấn và hỗ trợ khách hàng tốt nhất</span>
                    </p>
                    <div id="gap-1030431703" class="gap-element clearfix" style="display:block; height:auto;">
                    </div>
                    <div class="wrap-contact100">
                        <div class="loader hidden"></div>
                        <div class="block-form">
                            <form class="contact100-form validate-form">
                                @csrf
                            <div class="wrap-input100 validate-input" data-validate="Trường này là bắt buộc">
                                <input class="input100" type="text" name="name" required placeholder="Tên khách hàng">
                            <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Trường này là bắt buộc">
                                <input class="input100" type="email" name="email" placeholder="Email">
                            <span class="focus-input100"></span>
                            </div>
                            <div class="wrap-input100 validate-input" data-validate="Trường này là bắt buộc">
                                <input class="input100" type="text" name="phone" required placeholder="Phone">
                            <span class="focus-input100"></span>
                            </div>
                            <div class="container-contact100-form-btn">
                                <button class="contact100-form-btn" data-cms="{{app()->getLocale()}}-form-contact-2">
                                    NHẬN BÁO GIÁ
                                </button>
                            </div>
                            </form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>