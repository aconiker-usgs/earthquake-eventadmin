<?php

if (!isset($TEMPLATE)) {

  //
  // Get event details. Will set the following variables
  //   $EVENT {Array}
  //     Associative array containing event detail information
  //   $PROPERTIES {Array}
  //     Associative array containing event properties
  //     Same as $EVENT['properties']
  //   $GEOMETRY {Array}
  //     Associative array containing event geometry
  //     Same as $EVENT['geometry']
  //   $EVENT_CONFIG {Array}
  //     Associative array containing installation configuration parameters
  //   $eventid {String}
  //     Event id provided in request parameter
  //

  include_once '../lib/details.inc.php';


  $TITLE = $PROPERTIES['title'];
  $NAVIGATION = navItem('#', 'Event Summary');

  $HEAD = '<link rel="stylesheet" href="css/event.css"/>';
  $FOOT = '
      /* create event page with event details and config. */
      <script>
        var EventConfig = ' . json_encode($EVENT_CONFIG) . ';
        var EventDetails = ' . json_encode($EVENT) . ';
      </script>
      /* this script creates EventPage using EventConfig, EventDetails */
      <script src="js/event.js"></script>
    ';

  include 'template.inc.php';
}

if ($httpCode != 409) {
  include_once '../lib/inc/html.inc.php';
} else {
  print '<p class="alert error">The requested event has been deleted.</p>';
}
?>
