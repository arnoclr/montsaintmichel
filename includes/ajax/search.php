<?php

$terms = $_GET['q'] ?? "";

$response = getPageFromSearchTerms($terms);

header('Content-Type: application/json');
echo json_encode($response);
