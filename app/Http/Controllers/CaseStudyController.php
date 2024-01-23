<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;
use Contentful\Delivery\Query;

class CaseStudyController extends Controller
{
    public function index()
    {



        $client = new DeliveryClient(env('CONTENTFUL_DELIVERY_TOKEN'), env('CONTENTFUL_SPACE_ID'), env('CONTENTFUL_ENVIRONMENT_ID'));
        $query = new Query();
        $query->setContentType('caseStudies')
            ->orderBy('fields.date', true);
        $posts = $client->getEntries($query);

        $formattedPosts = [];
        foreach ($posts as $post) {
            $imageUrl = $post->featuredImage->getFile()->getUrl();
            $resizedImageUrl = $imageUrl . '?w=500&h=500&fit=fill&fm=webp';

            $formattedPosts[] = [
                'title' => $post->getTitle(),
                'img' => $resizedImageUrl,
                'slug' => $post->getSlug(),
                'type' => $post->getjobType(),
                'date' =>
                $post->getdate()->format('F jS, Y'),
                'industry' => $post->getIndustry(),
            ];
        }
        return Inertia('SuccessStories', ['stories' => $formattedPosts]);
    }

    public function show($slug)
    {
        $client = new DeliveryClient(env('CONTENTFUL_DELIVERY_TOKEN'), env('CONTENTFUL_SPACE_ID'), env('CONTENTFUL_ENVIRONMENT_ID'));
        $query = new Query();
        $query->setContentType('caseStudies')
            ->where('fields.slug', $slug);
        $post = $client->getEntries($query);

        $formattedPost = [];
        foreach ($post as $p) {
            $imageUrl = $p->featuredImage->getFile()->getUrl();
            $resizedImageUrl = $imageUrl . '?w=800&h=800&fit=fill&fm=webp';
            $formattedPost[] = [
                'title' => $p->getTitle(),
                'desc' => $p->getminiBlurb(),
                'img' => $resizedImageUrl,
                'slug' => $p->getSlug(),
                'content' => $p->getBody(),
                'type' => $p->getjobType(),
                'industry' => $p->getIndustry(),
                'image' => 'https:' . $resizedImageUrl,
                'date' =>
                $p->getdate()->format('F jS, Y'),
            ];
            $salary = [];
            $salary['hiredSalary'] = $p->getmonthlySalaryHiredRate();
            $salary['usSalary'] = $p->getmonthlySalaryUsaRate();
        }


        return Inertia('SuccessStory', ['story' => $formattedPost, 'salary' => $salary]);
    }
}
