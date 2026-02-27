@php
    $phone = SettingHelper::get_field('first_phone') ?: '';

    if ($headerLogo) {
        $media = MediaHelper::getImageById($headerLogo);
        $logo = $media && isset($media->file_name)
            ? asset('storage/' . $media->file_name)
            : asset('assets/img/logo/neev-logo.png');
    } else {
        $logo = asset('assets/img/logo/neev-logo.png');
    }

    $hotelSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Organization',
        'name' => $websiteName,
        'image' => $logo,
        '@id' => $logo,
        'url' => url('/'),
        'telephone' => $phone,
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Redcross Marg, Soalteemode',
            'addressLocality' => 'Kathmandu',
            'postalCode' => '44600',
            'addressCountry' => 'NP'
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 27.7036677,
            'longitude' => 85.2957058
        ],
        'sameAs' => url('/')
    ];
@endphp

<script type="application/ld+json">
{!! json_encode($hotelSchema, JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT) !!}
</script>