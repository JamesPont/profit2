<?php
/**
 * Created by PhpStorm.
 * User: James Pont
 * Date: 10.07.2016
 * Time: 19:37
 */

namespace App\Models;


use App\Model;
use App\MultiException;

/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */

class News extends Model{
    const TABLE = 'news';

    public $title;
    public $lead;
    public $author_id;

    public function __get($name) {
        switch ($name){
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }
    public function __isset($name) {
        switch ($name){
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }
    public function fill($data =[]){
        $e = new MultiException();

        if(true){
            $e[] = new \Exception("Title isn't correct");
        }
        if(true){
            $e[] = new \Exception("Text isn't correct");
        }
        throw $e;
    }
}
