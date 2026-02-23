<?php

namespace App\Repositories;

use Log;
use Illuminate\Support\Str;
use App\Traits\ImageFieldTrait;
use App\Repositories\HomeRepository;
use App\Repositories\TeamRepository;
use Illuminate\Support\Facades\View;
use App\Repositories\StoryRepository;
use App\Repositories\CompanyRepository;
use App\Repositories\AboutRepository;
use App\Repositories\DownloadRepository;
use App\Repositories\InvestorsRepository;

class PageRepository
{
    use ImageFieldTrait;

    // define template repository as per template name same as in TemplateType.php enums other wise not working
    protected $homeRepository, $blogRepository, $contactRepository, $aboutRepository, $searchRepository, $teamRepository, $storyRepository, $companyRepository, $mediaRepository, $downloadRepository, $investorsRepository;

    public function __construct(HomeRepository $homeRepository, TeamRepository $teamRepository, StoryRepository
     $storyRepository, CompanyRepository $companyRepository, AboutRepository $aboutRepository, MediaRepository $mediaRepository, DownloadRepository $downloadRepository, InvestorsRepository $investorsRepository)
    {
        $this->homeRepository = $homeRepository;
        $this->teamRepository = $teamRepository;
        $this->storyRepository = $storyRepository;
        $this->companyRepository = $companyRepository;
        $this->aboutRepository = $aboutRepository;
        $this->mediaRepository = $mediaRepository;
        $this->downloadRepository = $downloadRepository;
        $this->investorsRepository = $investorsRepository;
    }

    // insert or update meta data
    public function processMetaData($payload, $request)
    {
        $metaDatas = [];
        $metaDatas['seo_title'] = isset( $request->seo_title ) ? $request->seo_title : NULL;
        $metaDatas['seo_description'] = isset( $request->seo_description ) ? $request->seo_description : NULL;
        $metaDatas['excerpt'] = isset( $request->excerpt ) ? $request->excerpt : NULL;
        $metaDatas['featured_image'] = isset( $request->featured_image ) ? $request->featured_image : NULL;
        $metaDatas['common_single_banner_image'] = isset( $request->common_single_banner_image ) ? $request->common_single_banner_image : NULL;
        // add meta data as per form data

        return $metaDatas;
    }

    // get template view
    public function getTemplateView($template)
    {
        try {
            $viewName = 'backend.templates-pages.' . $template;

            if (View::exists($viewName)) {

                $view = View::make($viewName)->render();
                return $view;

            } else {
                return '';
            }

        } catch (\Exception $e) {
            \Log::error("Error rendering view: " . $e->getMessage());
            return response()->json(['error' => 'View not found or error rendering view'], 500);
        }
    }


    // edit get template view
    public function getEditTemplateView($request, $payload)
    {
        try {
            $template = $request->template;
            $pageID = $request->pageID;
            $metaDatas = $payload->postMeta->pluck('meta_value', 'meta_key')->toArray();
            $pageTemplate = $template;
            $viewName = "backend.templates-pages.$pageTemplate";

            if (View::exists($viewName)) {

                $view = View::make($viewName)->with('metaDatas', $metaDatas)->render();
                return $view;
            }
            else {
                return '';
            }

        } catch (\Exception $e) {
            Log::error("Error rendering view: " . $e->getMessage());
            return response()->json(['error' => 'View not found or error rendering view'], 500);
        }
    }

    // check and call the template processing
    public function findTemplateMethod($payload, $request)
    {
        $method = Str::camel( $request->page_template ); // output as CamelCase

        try {

            if ( $this->{$method.'Repository'} !== null && method_exists( $this->{$method.'Repository' }, 'processMetaData') ) {

                return $this->{$method.'Repository'}->processMetaData($payload, $request);
            }
            else {
                return [];
            }

        } catch (\Exception $e) {
            Log::error("Error rendering view: " . $e->getMessage());
            return [];
        }

        // if ( method_exists( $this, $method . 'Template' ) ) {

        //     return $this->{$method . 'Template'}($payload, $request);
        // }
        // else {
        //     return [];
        // }
    }

}
