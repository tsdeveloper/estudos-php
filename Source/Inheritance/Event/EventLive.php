<?php
namespace Source\Inheritance\Event;

class EventLive extends Event {

    private $address;

    public function __construct($event, $date, $price, $vacancies, $address) {
        parent::__construct($event, $date, $price, $vacancies);
        $this->address = $address;

    }

    public function getAddress() {
        return $this->address;
    }

}