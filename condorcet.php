<?php

include(__DIR__ . '/vendor/autoload.php');

use Condorcet\Condorcet;
use Condorcet\Election;
use Condorcet\Candidate;
use Condorcet\CondorcetUtil;
use Condorcet\Vote;

$myElection1 = new Election () ;

$data = json_decode($_POST['data']);
foreach ($data->candidates as $id) {
    $c = new Candidate($id);
    $myElection1->addCandidate($c);
}

foreach ($data->votes as $vote) {
    $myElection1->addVote($vote);
}

$result = array();
$myResultBySchulze = $myElection1->getResult('Schulze');
foreach ($myResultBySchulze as $rank => $candidates) {
    $result[] = array(
        'rank' => $rank,
        'candidates' => array_map(function($c) { return $c->getName(); }, $candidates),
    );
}

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');

echo json_encode($result);
