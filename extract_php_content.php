<?php
// Extract HTML content from PHP pages (between ?> and $content = ob_get_clean)
$files = ['about', 'courses', 'contact', 'services', 'testimonials'];
foreach ($files as $name) {
    $path = __DIR__ . "/public/{$name}.php";
    if (!file_exists($path)) continue;
    $f = file_get_contents($path);
    $start = strpos($f, '?>');
    if ($start === false) continue;
    $start += 2;
    $end = strpos($f, '$content = ob_get_clean()');
    if ($end === false) $end = strpos($f, 'include \'layout.php\'');
    if ($end === false) continue;
    $content = substr($f, $start, $end - $start);
    $content = preg_replace('/href="([a-z-]+)\.php"/', 'href="{{ route(\'$1\') }}"', $content);
    $content = preg_replace('/href=\'([a-z-]+)\.php\'/', "href='{{ route('$1') }}'", $content);
    $out = __DIR__ . "/resources/views/{$name}_extracted.blade.php";
    $wrapper = "@extends('layouts.app')\n@section('title', '" . ucfirst($name) . "')\n@section('content')\n" . $content . "\n@endsection";
    file_put_contents($out, $wrapper);
    echo "Written $out\n";
}
