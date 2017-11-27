<?php

namespace Metier;

class Task
{
    private $id_task;
    private $title;
    private $content;
    private $date

    public function __construct($id_task, $title, $content, $date){
        $this->id_tache = $id_task;
        $this->title = $title;
        $this->content = $content;
        $this->date = $date;
    }

    public function getId(){
        return $this->id_task;
    }

    public function getTitle(){
        return $this->title;
    }

    public function getContent(){
        return $this->content;
    }

    public function getDate(){
        return $this->date;
    }
    /**
     * @param mixed $id_task
     */
    public function setIdTask($id_task)
    {
        $this->id_task = $id_task;
    }/**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }/**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }/**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    public function __toString(){
        return $this->id_tache . ' ' . $this->title . ' ' . $this->date . ' ' . $this->content;
    }
}
