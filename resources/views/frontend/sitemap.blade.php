{!! '<' . '?xml version="1.0" encoding="UTF-8"?>' !!}
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>{{ url('/') }}</loc>
        <lastmod>{{ now()->toIso8601String() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>1.0</priority>
    </url>
    @if ($posts->isNotEmpty())
        @foreach ($posts as $post)
            <url>
                <loc>{{ route('frontend.post.index', $post->slug) }}</loc>
                <lastmod>{{ $post->updated_at->toIso8601String() }}</lastmod>
                <priority>0.8</priority>
            </url>
        @endforeach
    @endif
    @if ($pages->isNotEmpty())
        @foreach ($pages as $page)
            <url>
                <loc>{{ route('frontend.post.index', $page->slug) }}</loc>
                <lastmod>{{ $page->updated_at->toIso8601String() }}</lastmod>
            </url>
        @endforeach
    @endif
    @if ($stories->isNotEmpty())
        @foreach ($stories as $story)
            <url>
                <loc>{{ route('frontend.story.index', $story->slug) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($story->updated_at)->toIso8601String() }}</lastmod>
                <priority>0.7</priority>
            </url>
        @endforeach
    @endif
    @if ($companies->isNotEmpty())
        @foreach ($companies as $company)
            <url>
                <loc>{{ route('frontend.company.index', $company->slug) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($company->updated_at)->toIso8601String() }}</lastmod>
                <priority>0.7</priority>
            </url>
        @endforeach
    @endif
    @if ($sectors->isNotEmpty())
        @foreach ($sectors as $sector)
            <url>
                <loc>{{ route('frontend.category.sector.index', $sector->slug) }}</loc>
                <lastmod>{{ \Carbon\Carbon::parse($sector->updated_at)->toIso8601String() }}</lastmod>
                <priority>0.7</priority>
            </url>
        @endforeach
    @endif
</urlset>
