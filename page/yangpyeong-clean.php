<?php
/**
 * 양평구하수구청소 — 인근 지역 SEO 랜딩
 */
$service_slug = 'yangpyeong-clean';
$service_canonical_path = '/page/yangpyeong-clean.php';
$service_area_served = '양평구';
$service_name = '양평구 하수구청소';
$service_keyword = '양평구하수구청소';
$service_description = '원진하수구의 양평구하수구청소 안내. 양평·용문·지평·옥천 등 인근 아파트·주택·상가 하수구·싱크대·배수구 청소를 전화로 상담합니다.';
$service_intro = '양평구(양평군 생활권)는 주택·전원주택·상가가 섞여 배관 구조가 현장마다 다릅니다. 물이 느리거나 악취·역류가 반복되면 입구만 임시로 뚫기보다, 전화로 증상과 위치를 알려주시면 필요한 청소 범위를 안내합니다. 경기광주 본 서비스권과 인접해 출동 가능 여부를 빠르게 확인해 드립니다.';
$service_signs = array(
    '싱크대·욕실 물이 평소보다 천천히 내려가는 경우',
    '배수구에서 악취가 계속 올라오는 경우',
    '비가 오거나 물 사용량이 많을 때 역류하는 경우',
    '한 번 뚫은 뒤에도 같은 증상이 반복되는 경우',
);
$service_checks = array(
    '양평구 내 위치와 막힘·악취 발생 지점을 전화로 확인합니다.',
    '주거·상가 여부, 배수 속도, 최근 발생 시점을 파악합니다.',
    '하수구·싱크대·배수구 중 우선 확인할 구간을 안내합니다.',
    '출동·청소 가능 시간과 준비 사항을 안내합니다.',
);
$service_faqs = array(
    array(
        'question' => '양평구하수구청소도 전화만으로 상담할 수 있나요?',
        'answer' => '네. 원진하수구는 사진·문의폼 없이 전화로 증상과 위치를 확인한 뒤 청소·출동 가능 여부를 안내합니다.',
    ),
    array(
        'question' => '양평구와 경기광주 중 어디에 살아도 가능한가요?',
        'answer' => '양평구·경기광주 인근이면 전화로 출동 가능 여부를 확인합니다. 정확한 가능 여부는 위치와 시간에 따라 달라질 수 있습니다.',
    ),
    array(
        'question' => '양평구 싱크대·변기 막힘도 함께 상담되나요?',
        'answer' => '가능합니다. 하수구청소뿐 아니라 싱크대·변기·배수구 막힘 증상도 전화로 안내합니다. 막힘 전용 안내는 양평구하수구막힘 페이지도 참고하세요.',
    ),
);
$related_services = array(
    array('slug' => 'yangpyeong-clog', 'name' => '양평구하수구막힘', 'url' => '/page/yangpyeong-clog.php'),
    array('slug' => 'sink', 'name' => '싱크대·주방 배관 청소', 'url' => '/page/service-sink.php'),
    array('slug' => 'drain', 'name' => '욕실·배수구 청소', 'url' => '/page/service-drain.php'),
    array('slug' => 'toilet', 'name' => '변기 막힘 점검', 'url' => '/page/service-toilet.php'),
    array('slug' => 'pipe', 'name' => '배관 청소', 'url' => '/page/service-pipe.php'),
);
include __DIR__ . '/_service-drain-page.php';
