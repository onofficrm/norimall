<?php
/**
 * 사이트 복제 전용 설정 (이 파일만 사이트마다 수정)
 *
 * - [공통 유지] phone: 전 사이트 동일. 홈·CTA에 크게 표시 + 클릭 시 tel 연결
 * - [사이트마다 변경] 지역명·SEO·권역 목록·후기
 * - React/Vite 재빌드 불필요. 샘플: `/_site.clone.config.sample.php`
 * - 절차: SITE-CLONE-GUIDE.md
 */
if (!defined('_GNUBOARD_')) {
    exit;
}

return array(
    /* =========================================================
     * [공통 유지] — 복사본에도 그대로 둡니다
     * ========================================================= */
    'phone' => '010-4265-2634',
    'ceo_name' => '김배관',
    'business_no' => '123-45-67890',
    'email' => 'help@example.com',
    'builder_project_id' => 'gangdong-drain',

    /* =========================================================
     * [사이트마다 변경] — 원진하수구 · 경기광주 SEO
     * ========================================================= */
    'region_name' => '경기광주',
    'region_short' => '광주',
    'region_initial' => '원',
    'company_name' => '원진하수구',
    'address' => '경기도 광주시 경안로 00',

    'site_name' => '원진하수구 | 경기광주하수구청소',
    'site_desc' => '경기광주 하수구청소·막힘·싱크대·변기 배수 문제 전화 상담. 오포·초월·곤지암 등 전 지역 출동.',
    'seo_title' => '경기광주하수구청소 | 원진하수구',
    'seo_description' => '원진하수구는 경기광주하수구청소 전문. 오포·초월·곤지암·경안·광남 등 하수구·싱크대·변기 막힘과 배관 청소를 전화 상담으로 안내합니다.',
    'main_keyword' => '경기광주하수구청소',
    'sub_keywords' => array(
        '경기광주 하수구막힘',
        '경기광주 싱크대 막힘',
        '경기광주 변기 막힘',
        '경기광주 배수구 청소',
        '오포 하수구청소',
        '초월 하수구청소',
        '곤지암 하수구청소',
        '원진하수구',
    ),
    'footer_desc' => '원진하수구 — 경기광주 하수구청소·막힘 전화 상담',

    /* 권역별 랜딩 — 페이지마다 label·blurb를 다르게 둬 중복 콘텐츠를 줄입니다 */
    'local_areas' => array(
        array(
            'slug' => 'opo',
            'name' => '오포',
            'label' => '오포 하수구청소',
            'url' => '/page/local-opo.php',
            'blurb' => '오포1·2동·고산·문형 일대 아파트·빌라·상가 주방 배관 막힘과 하수구청소를 전화로 안내합니다.',
        ),
        array(
            'slug' => 'chowol',
            'name' => '초월',
            'label' => '초월 하수구청소',
            'url' => '/page/local-chowol.php',
            'blurb' => '초월읍 학동·산수로 인근 주거·공장·상가의 배수 불량과 하수구 역류를 현장 상황에 맞춰 상담합니다.',
        ),
        array(
            'slug' => 'gonjiam',
            'name' => '곤지암',
            'label' => '곤지암 하수구청소',
            'url' => '/page/local-gonjiam.php',
            'blurb' => '곤지암읍·오향 일대 단독·다가구·음식점 주방 배수구 막힘과 배관 청소를 빠르게 안내합니다.',
        ),
        array(
            'slug' => 'gyeongan',
            'name' => '경안·송정',
            'label' => '경안 하수구청소',
            'url' => '/page/local-gyeongan.php',
            'blurb' => '경안동·송정동 시청 인근과 중심상권의 싱크대·화장실·하수구 막힘을 전화 상담으로 접수합니다.',
        ),
        array(
            'slug' => 'tanbeol',
            'name' => '탄벌·쌍령',
            'label' => '탄벌 하수구청소',
            'url' => '/page/local-tanbeol.php',
            'blurb' => '탄벌동·쌍령동 신축·기존 아파트 단지의 반복 막힘과 배수 악취 원인을 확인하고 안내합니다.',
        ),
        array(
            'slug' => 'gwangnam',
            'name' => '광남',
            'label' => '광남 하수구청소',
            'url' => '/page/local-gwangnam.php',
            'blurb' => '광남1·2동 대단지와 상가 밀집 구간의 주방·욕실·바닥 배수 문제를 전화로 상담합니다.',
        ),
        array(
            'slug' => 'sinhyeon',
            'name' => '신현·능평',
            'label' => '신현 하수구청소',
            'url' => '/page/local-sinhyeon.php',
            'blurb' => '신현동·능평동 오포 권역 주거·근린상가의 하수구청소와 배관 점검을 출동 가능 여부와 함께 안내합니다.',
        ),
        array(
            'slug' => 'docheok',
            'name' => '도척',
            'label' => '도척 하수구청소',
            'url' => '/page/local-docheok.php',
            'blurb' => '도척면 농촌·공장·주택 배관의 막힘·악취 증상을 전화로 확인한 뒤 필요한 작업을 안내합니다.',
        ),
        array(
            'slug' => 'toechon',
            'name' => '퇴촌',
            'label' => '퇴촌 하수구청소',
            'url' => '/page/local-toechon.php',
            'blurb' => '퇴촌면 주택·펜션·근린시설의 배수 불량과 하수구 문제를 지역 출동 기준으로 상담합니다.',
        ),
        array(
            'slug' => 'namjong',
            'name' => '남종',
            'label' => '남종 하수구청소',
            'url' => '/page/local-namjong.php',
            'blurb' => '남종면 일대 단독주택·소규모 시설의 싱크대·변기·배수구 막힘을 전화 상담으로 안내합니다.',
        ),
        array(
            'slug' => 'namhansanseong',
            'name' => '남한산성',
            'label' => '남한산성 하수구청소',
            'url' => '/page/local-namhansanseong.php',
            'blurb' => '남한산성면 인근 주거·상가의 하수구·배수 문제를 경기광주 출동권으로 상담합니다.',
        ),
    ),
    'area_spots' => array(
        '광주역 인근', '태전역 인근', '초월역 인근', '곤지암역 인근',
        '오포 고산', '경안 중심', '광남 대단지', '신현·능평',
    ),

    /* 표시용 후기 — 광주 권역·청소 톤으로 작성 (복제 원본과 문장 분리) */
    'reviews' => array(
        array(
            'area' => '오포',
            'title' => '주방 배수 청소 후 흐름 정상',
            'body' => '기름때로 싱크대가 자주 막혔는데, 전화로 증상만 말씀드려도 작업 방향을 바로 안내해 주셨어요.',
            'rating' => 5,
        ),
        array(
            'area' => '초월',
            'title' => '욕실 하수구 악취 해결',
            'body' => '배수구 냄새가 심했는데 원인을 차근히 설명해 주시고, 필요한 청소만 진행해 주셔서 안심됐습니다.',
            'rating' => 5,
        ),
        array(
            'area' => '곤지암',
            'title' => '상가 주방 막힘 당일 안내',
            'body' => '영업 전에 급하게 연락했는데 대응이 빨랐고, 배관 상태 확인 후 청소 범위를 명확히 알려 주셨습니다.',
            'rating' => 5,
        ),
        array(
            'area' => '광남',
            'title' => '아파트 변기 막힘 상담',
            'body' => '물이 차올라 불안했는데 전화 상담이 바로 연결됐고, 현장 상황에 맞는 안내를 받았습니다.',
            'rating' => 5,
        ),
    ),
);
