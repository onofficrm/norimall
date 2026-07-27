<?php
/**
 * 양평구하수구막힘 — 인근 지역 SEO 랜딩
 */
$service_slug = 'yangpyeong-clog';
$service_canonical_path = '/page/yangpyeong-clog.php';
$service_area_served = '양평구';
$service_name = '양평구 하수구막힘';
$service_keyword = '양평구하수구막힘';
$service_description = '원진하수구의 양평구하수구막힘 안내. 양평 인근 하수구·싱크대·변기·배수구 막힘과 역류 증상을 전화 상담으로 확인합니다.';
$service_intro = '양평구하수구막힘은 입구 이물질 문제와 배관 안쪽 막힘을 구분해 확인하는 것이 중요합니다. 물이 안 내려가거나 차오르면 무리해서 물을 계속 내리기보다, 현재 수위·발생 위치·증상 시작 시점을 전화로 알려주시면 확인 순서를 안내합니다. 청소가 더 적합한 경우에는 양평구하수구청소 안내와 함께 설명드립니다.';
$service_signs = array(
    '하수구·싱크대·변기 물이 거의 내려가지 않는 경우',
    '변기 수위가 올라가거나 넘칠 위험이 있는 경우',
    '여러 배수구가 동시에 느려지거나 역류하는 경우',
    '뚫어뻥으로 잠시 해결됐다가 금방 다시 막히는 경우',
);
$service_checks = array(
    '막힌 위치(하수구·싱크대·변기·배수구)를 전화로 확인합니다.',
    '물 수위, 역류 여부, 발생 시간을 파악합니다.',
    '임시 조치(물 사용 중단 등)와 확인이 필요한 항목을 안내합니다.',
    '양평구 현장 출동·작업 가능 여부를 안내합니다.',
);
$service_faqs = array(
    array(
        'question' => '양평구하수구막힘이 심할 때 바로 물을 내려도 되나요?',
        'answer' => '넘칠 위험이 있으면 반복해서 물을 내리지 않는 것이 좋습니다. 주변 물 사용을 줄이고 현재 수위를 전화로 알려주세요.',
    ),
    array(
        'question' => '막힘과 청소 중 어떤 안내를 받아야 하나요?',
        'answer' => '당장 물이 안 내려가면 막힘 확인이 우선이고, 반복·악취·느린 배수가 길었다면 청소 범위 확인이 필요할 수 있습니다. 증상을 말씀해 주시면 구분해 안내합니다.',
    ),
    array(
        'question' => '양평구에서도 밤·주말 전화 상담이 되나요?',
        'answer' => '긴급 상황은 전화 상담 후 가능한 일정과 대응 여부를 안내드립니다. 양평구·경기광주 인근 출동 가능 여부를 함께 확인합니다.',
    ),
);
$related_services = array(
    array('slug' => 'yangpyeong-clean', 'name' => '양평구하수구청소', 'url' => '/page/yangpyeong-clean.php'),
    array('slug' => 'sink', 'name' => '싱크대·주방 배관 청소', 'url' => '/page/service-sink.php'),
    array('slug' => 'drain', 'name' => '욕실·배수구 청소', 'url' => '/page/service-drain.php'),
    array('slug' => 'toilet', 'name' => '변기 막힘 점검', 'url' => '/page/service-toilet.php'),
    array('slug' => 'pipe', 'name' => '배관 청소', 'url' => '/page/service-pipe.php'),
);
include __DIR__ . '/_service-drain-page.php';
