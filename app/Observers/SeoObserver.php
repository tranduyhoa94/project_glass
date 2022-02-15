<?php

namespace App\Observers;

use App\Models\Seo;

class SeoObserver
{
    /**
     * Handle the seo "created" event.
     *
     * @param Seo $seo
     * @return void
     */
    public function created(Seo $seo)
    {
        //
    }

    /**
     * Handle the seo "updated" event.
     *
     * @param Seo $seo
     * @return void
     */
    public function updated(Seo $seo)
    {
        //
    }

    /**
     * Handle the seo "deleted" event.
     *
     * @param Seo $seo
     * @return void
     */
    public function deleted(Seo $seo)
    {
        //
    }

    /**
     * Handle the seo "restored" event.
     *
     * @param Seo $seo
     * @return void
     */
    public function restored(Seo $seo)
    {
        //
    }

    /**
     * Handle the seo "force deleted" event.
     *
     * @param Seo $seo
     * @return void
     */
    public function forceDeleted(Seo $seo)
    {
        //
    }
}
