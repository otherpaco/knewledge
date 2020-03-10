<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Documents</title>
</head>
<body>
    <h1>{{ $document->title }}</h1>
    <small>{{ $document->subtitle }}</small>
    <p><b>Abstract:</b> {{ $document->abstract }}</p>
    <ul>
        <li>Date: {{ $document->release_date->format('Y-m-d') }}</li>
        <li>Language: {{ $document->language->name }}</li>
        <li>Media Type: {{ $document->mediaType->name }}</li>
        @if(count($document->authors))
            <li>Authors:&nbsp;
                @foreach($document->authors as $author)
                    {{ $author->name }}&nbsp;
                @endforeach
            </li>
        @endif
        @if(count($document->publishers))
            <li>Publishers:&nbsp;
                @foreach($document->publishers as $publisher)
                    {{ $publisher->name }}&nbsp;
                @endforeach
            </li>
        @endif
        @if(count($document->principals))
            <li>Principals:&nbsp;
                @foreach($document->principals as $principal)
                    {{ $principal->name }}&nbsp;
                @endforeach
            </li>
        @endif
        @if(count($document->actors))
            <li>Actors:&nbsp;
                @foreach($document->actors as $actor)
                    {{ $actor->name }}&nbsp;
                @endforeach
            </li>
        @endif
        @foreach($document->links as $link)
            <li><a href="{{ $link->url }}">{{ $link->title }}</a></li>
        @endforeach
    </ul>
</body>
</html>
