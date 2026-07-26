import { useEffect, useMemo, useState } from 'react';
import { AnimatePresence, motion } from 'motion/react';
import { Clock, Phone, Star, Users, X } from 'lucide-react';
import { getDongFromUrl, phoneCtaLabel, phoneCtaSubLabel, regionName, reviews, telHref } from '../data';

export const TrustSignals = () => {
  const [consultToday, setConsultToday] = useState(11);
  const [responseMin] = useState(3);

  useEffect(() => {
    const hour = new Date().getHours();
    const base = 8 + Math.min(hour, 18);
    setConsultToday(base + (hour % 3));
  }, []);

  return (
    <div className="flex flex-wrap gap-2">
      <span className="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-orange-500 text-white text-sm font-extrabold shadow-lg shadow-orange-500/30">
        <Users className="w-4 h-4" /> 오늘 상담 {consultToday}건
      </span>
      <span className="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-white/10 border border-white/20 text-white text-sm font-bold">
        <Clock className="w-4 h-4 text-orange-400" /> 평균 응답 {responseMin}분
      </span>
      <span className="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl bg-white/10 border border-white/20 text-white text-sm font-bold">
        {regionName} 출동 가능
      </span>
    </div>
  );
};

export const PhoneCta = ({
  area,
  className = '',
  size = 'md',
}: {
  area?: string;
  className?: string;
  size?: 'sm' | 'md' | 'lg';
}) => {
  const dong = area || getDongFromUrl() || regionName;
  const pad = size === 'lg' ? 'px-8 py-5' : size === 'sm' ? 'px-4 py-3' : 'px-6 py-4';
  const numberSize = size === 'lg' ? 'text-3xl' : size === 'sm' ? 'text-xl' : 'text-2xl';
  return (
    <a
      href={telHref()}
      className={`inline-flex flex-col items-center justify-center gap-1 bg-orange-500 hover:bg-orange-600 text-white rounded-2xl font-extrabold transition-all shadow-lg shadow-orange-500/25 leading-none ${pad} ${className}`}
    >
      <span className="inline-flex items-center gap-1.5 text-xs sm:text-sm opacity-95">
        <Phone className="w-4 h-4" />
        {phoneCtaSubLabel(dong)}
      </span>
      <span className={`${numberSize} tracking-tight`}>{phoneCtaLabel(dong)}</span>
    </a>
  );
};

export const Reviews = () => (
  <section id="reviews" className="py-20 md:py-28 bg-white scroll-mt-20">
    <div className="max-w-7xl mx-auto px-4">
      <div className="flex flex-col md:flex-row md:items-end md:justify-between gap-4 mb-10">
        <div>
          <p className="text-orange-500 font-extrabold tracking-widest text-sm mb-3">REVIEWS</p>
          <h2 className="text-3xl md:text-4xl font-black text-slate-900 tracking-tight break-keep">
            {regionName} 현장 후기
          </h2>
        </div>
        <a href="/bbs/board.php?bo_table=notice" className="text-orange-500 font-extrabold hover:text-orange-600">
          시공사례 더보기 →
        </a>
      </div>
      <div className="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
        {reviews.map((r) => (
          <article key={r.title} className="rounded-3xl border border-slate-200 bg-slate-50 p-6 flex flex-col">
            <div className="flex items-center gap-1 mb-3">
              {Array.from({ length: r.rating }).map((_, i) => (
                <Star key={i} className="w-4 h-4 fill-orange-400 text-orange-400" />
              ))}
            </div>
            <span className="inline-flex self-start mb-3 px-2.5 py-1 rounded-full bg-orange-100 text-orange-600 text-xs font-extrabold">
              {r.area}
            </span>
            <h3 className="font-extrabold text-slate-900 text-lg mb-2 break-keep">{r.title}</h3>
            <p className="text-slate-600 text-sm font-medium leading-relaxed break-keep flex-grow">{r.body}</p>
          </article>
        ))}
      </div>
    </div>
  </section>
);

export const ExitPopup = () => {
  const [open, setOpen] = useState(false);
  const shownKey = 'pinkribbon_exit_popup_v1';

  useEffect(() => {
    if (sessionStorage.getItem(shownKey)) return;

    const openOnce = () => {
      if (sessionStorage.getItem(shownKey)) return;
      sessionStorage.setItem(shownKey, '1');
      setOpen(true);
    };

    const onMouseOut = (e: MouseEvent) => {
      if (e.clientY <= 0) openOnce();
    };

    const onScroll = () => {
      const max = document.documentElement.scrollHeight - window.innerHeight;
      if (max > 0 && window.scrollY / max >= 0.5) openOnce();
    };

    document.addEventListener('mouseout', onMouseOut);
    window.addEventListener('scroll', onScroll, { passive: true });
    return () => {
      document.removeEventListener('mouseout', onMouseOut);
      window.removeEventListener('scroll', onScroll);
    };
  }, []);

  const area = useMemo(() => getDongFromUrl() || regionName, [open]);

  return (
    <AnimatePresence>
      {open && (
        <motion.div
          className="fixed inset-0 z-[80] flex items-end sm:items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm"
          initial={{ opacity: 0 }}
          animate={{ opacity: 1 }}
          exit={{ opacity: 0 }}
        >
          <motion.div
            initial={{ y: 40, opacity: 0 }}
            animate={{ y: 0, opacity: 1 }}
            exit={{ y: 20, opacity: 0 }}
            className="relative w-full max-w-md rounded-[2rem] bg-white p-6 md:p-8 shadow-2xl"
          >
            <button
              type="button"
              onClick={() => setOpen(false)}
              className="absolute top-4 right-4 w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center"
              aria-label="닫기"
            >
              <X className="w-4 h-4" />
            </button>
            <p className="text-orange-500 font-extrabold text-sm mb-2">잠깐만요</p>
            <h3 className="text-2xl font-black text-slate-900 tracking-tight mb-3 break-keep">
              전화로 바로 상담하세요
            </h3>
            <p className="text-slate-600 font-medium mb-6 break-keep">
              {area} 하수구청소·막힘 증상을 전화로 알려주시면 빠르게 안내드립니다.
            </p>
            <div className="space-y-3">
              <PhoneCta area={area} className="w-full" />
            </div>
          </motion.div>
        </motion.div>
      )}
    </AnimatePresence>
  );
};
