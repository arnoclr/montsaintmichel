<?php

switch ($_GET['action'] ?? "") {
    case 'autoComplete':
        $word = $_GET['word'] ?? "";
        $response = getAutoCompletion($word);
        break;
    default:
        $terms = $_GET['q'] ?? "";
        $response = getPageFromSearchTerms($terms);
        break;
}

header('Content-Type: application/json');
echo json_encode($response);
