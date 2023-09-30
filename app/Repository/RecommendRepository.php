<?php

namespace App\Repository;

use App\Models\Recommend;
use App\Models\RecommendTag;
use App\Models\Tag;

class RecommendRepository
{
    /**
     * get Recommend records
     * 
     * @param int $page - number of page, default by 0
     * @param int $perPage - number of records per page, default by 8
     * @param int $typeId - recommend type id
     * @param int $tagId - hashtag id
     * 
     * @return list of Recommend
     * 
     */

    public function get($page, $perPage, $typeId, $tagId)
    {
        $page = $page ?? 0;
        $perPage = $perPage ?? 8;
        $query = Recommend::select("description", "image_url", "datetime", "tag");
            
        if($typeId) {
            $query->where("recommend_type_id", $typeId);
        }

        if($tagId) {
            $query->leftJoin("recommend_tags", "recommend_tags.recommend_id", "=", "recommends.id")
            ->where("tag_id", $tagId);
        }

        return $query->limit($perPage)
        ->offset($page * $perPage)
        ->get();
    }

    /**
     * insert one record of Recommend
     * 
     * @param array $data
     * 
     * @return void
     */

    public function insert($data)
    {
    
        $recommendId = Recommend::insertGetId([
            "recommend_type_id" => data_get($data, "recommend_type_id"),
            "description" => data_get($data, "description"),
            "image_url" => data_get($data, "image_url"),
            "datetime" => data_get($data, "datetime"),
        ]);

        $tagIds = data_get($data, "tag_ids");
        if (!empty($tagIds)) {
            $tagNames = [];
            foreach($tagIds as $tagId) {
                RecommendTag::insert([
                    "recommend_id" => $recommendId,
                    "tag_id" => $tagId
                ]);
                $tag = Tag::find($tagId);
                array_push($tagNames, [
                    'id' => $tag->id,
                    'name' => $tag->name
                ]);
            }
            Recommend::where('id', '=', $recommendId)->update([
                'tag' => json_encode($tagNames)
            ]);
        }
        
    }
}