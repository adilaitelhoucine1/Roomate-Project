<?php
require_once(__DIR__ . '/../models/User.php');
require_once(__DIR__ . '/../models/Student.php');
require_once(__DIR__ . '/../models/Announcement.php');
require_once(__DIR__ . '/../models/searchmodel.php');

class search_controller extends BaseController
{
    private $searchmodel;
    private $announcementmodel;
    public function __construct()
    {
        $this->searchmodel = new search_API();
        $this->announcementmodel = new Announcement();
    }


    public function searchAnnouncements()
    {
        $searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

        if($searchQuery === ""){
            $announcements = $this->announcementmodel->getallanounces();
        }
        else{
            $announcements = $this->searchmodel->searchAnnouncements($searchQuery);
        }
        if (empty($announcements)) {
            $announcements = [];
        }
     echo json_encode($announcements);
    }
}
