<?php

// ----------------------------------------
// Reusable function to fetch API data
// ----------------------------------------
function fetchApiData($url)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL            => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_TIMEOUT        => 10
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        curl_close($curl);
        return [
            "status" => false,
            "data"   => [],
            "error"  => curl_error($curl)
        ];
    }

    curl_close($curl);

    $decoded = json_decode($response, true);

    if ($decoded === null || !isset($decoded['data'])) {
        return [
            "status" => false,
            "data"   => [],
            "error"  => "Invalid JSON response"
        ];
    }

    return [
        "status" => true,
        "data"   => $decoded['data'],
        "error"  => null
    ];
}


// ----------------------------------------
// Fetch Blogs
// ----------------------------------------
$blogsApi = "https://projects.thedeltagroup.co.in/wp-json/wl/v1/posts";
$blogsRes = fetchApiData($blogsApi);

$blogs = $blogsRes['status'] ? $blogsRes['data'] : [];
if (!$blogsRes['status']) {
    echo "Blog API Error: " . $blogsRes['error'];
}


?>

<?php
$currentSlug = $_GET['slug'] ?? '';

function buildUrl($page, $slug = '')
{
    $pageName = basename($page, ".php");

    // Blog page
    if ($pageName === "blog-details" && $slug) {
        return "blog/$slug";
    }


    // Other pages
    return "$pageName.php";
}

?>