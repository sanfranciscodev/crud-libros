<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The class name.
     *
     * @var string
     */
    const CLASS_NAME = 'App\Book';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books';


    //Getters and setters
    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }
}
