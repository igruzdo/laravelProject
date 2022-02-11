<?php

namespace App\Services;

use App\Contracts\Parser;
use Laravie\Parser\Document;
use Orchestra\Parser\Xml\Facade as XmlParser;
use App\Models\Resource;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Str;

class ParserService implements Parser
{
    private Document $document;
    private string $link;

    public function setLink(string $link): Parser
    {
        $this->document = XmlParser::load($link);
        $this->link = $link;
        Resource::create([
            'name' => $link
        ]);
        return $this;
    }

    public function parse(): void
    {
        $data = $this->document->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ],
        ]);


        // $isResourceExist = Resource::query()->select()->where('name', $this->link)->get()->contains('name', $this->link);
        // dd($this->link);
        // if($isResourceExist) {
        //     $categoryCreated = Resource::create(['name' => $this->link]);
        // }


        //    $news = $service->setLink($url)->parse();

        $title = $data['title'];
        $newsList = $data['news'];

        $categoryIsExisted = Category::query()->select()->where('title', $title)->get()->contains('title', $title);
        //    создаем категорию, если такой не существует
        if(!$categoryIsExisted) {
            $categoryCreated = Category::create([
                'title' =>  $title,
                'link' =>  $data['link'],
                'description' =>  $data['description'],
                'image' =>  $data['image'],
            ]);
        
        }

        foreach($newsList as $newsItem) {
            $newsItemIsExisted = News::query()->select()->where('title', $newsItem['title'])->get()->contains('title', $newsItem['title']);
            // создаем новости, если их не существует
            if(!$newsItemIsExisted) {
                $data = $newsItem;  
                $created = News::create($data);
                $category = Category::query()->select()->where('title', $title)->get();
                $created->categories()->attach($category);
            }
        }
    }
}