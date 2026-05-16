<x-app-layout>
    <div class="relative min-h-screen bg-[#E0C9A6] text-[#442D25]">
        <div class="max-w-screen-sm mx-auto px-4 py-10">
            <div class="mb-8 flex flex-col gap-4 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD]/95 p-6 shadow-[0_30px_70px_rgba(68,45,37,0.08)] backdrop-blur-sm">
                <div class="flex flex-col gap-3">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <div class="font-buran text-sm uppercase tracking-[0.45em] text-[#442D25]">Товарищ Ваксенов</div>
                        <nav class="hidden sm:flex gap-3 text-xs uppercase tracking-[0.18em] font-storm text-[#442D25]/90">
                            <a href="#manifesto" class="transition hover:text-[#A25F2A]">Манифест</a>
                            <a href="#dossier" class="transition hover:text-[#A25F2A]">Досье</a>
                            <a href="#links" class="transition hover:text-[#A25F2A]">Ссылки</a>
                        </nav>
                    </div>
                    <div class="flex items-center gap-3">
                        <button id="about-menu-toggle" class="sm:hidden rounded-lg border border-[#442D25]/20 bg-[#E0C9A6] px-3 py-2 text-sm font-semibold uppercase tracking-[0.18em] text-[#442D25] transition hover:border-[#A25F2A]/40 hover:text-[#A25F2A]">Меню</button>
                    </div>
                    <div id="about-mobile-menu" class="hidden flex-col gap-3 rounded-2xl border border-[#442D25]/10 bg-[#FAEEDD]/70 p-4 text-sm uppercase tracking-[0.18em] font-storm text-[#442D25]">
                        <a href="#manifesto" class="transition hover:text-[#A25F2A]">Манифест</a>
                        <a href="#dossier" class="transition hover:text-[#A25F2A]">Досье</a>
                        <a href="#links" class="transition hover:text-[#A25F2A]">Ссылки</a>
                    </div>
                </div>
            </div>

            <section id="home" class="space-y-6 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD] p-8 shadow-[0_20px_45px_rgba(68,45,37,0.08)]">
                <img src="/about/logow.png" alt="Logo" class="mx-auto h-24 w-auto rounded-full border border-[#442D25]/10 bg-[#E0C9A6] p-2" />
                <div class="space-y-3 text-center">
                    <h1 class="font-buran text-4xl leading-tight tracking-[-0.03em] text-[#442D25]">Товарищ Ваксенов</h1>
                    <p class="mx-auto max-w-xl font-storm text-lg leading-relaxed text-[#442D25]/90">цифровая карточка гражданина</p>
                </div>
            </section>

            <hr class="my-10 border-[#442D25]/20" />

            <section id="manifesto" class="space-y-6 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD]/90 p-7 shadow-[0_20px_40px_rgba(68,45,37,0.06)]">
                <h2 class="font-buran text-2xl uppercase tracking-[0.25em] text-[#442D25]">Манифест</h2>
                <p class="font-storm text-base leading-8 text-[#442D25]/90">
                    Думскролить становится вредно, а инфы меньше не становится. Мир шумит и не знает покоя.
                    Поэтому я собрал всё самое важное в кучку и представляю чистую БАЗУ.
                    Ибо в тишине обретается порядок.
                </p>
            </section>

            <hr class="my-10 border-[#442D25]/20" />

            <section id="dossier" class="space-y-6 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD]/90 p-7 shadow-[0_20px_40px_rgba(68,45,37,0.06)]">
                <div class="flex flex-col gap-6 lg:flex-row lg:items-start lg:justify-between">
                    <img src="/about/men.png" alt="Эльдар" class="h-64 w-full max-w-[260px] rounded-[2rem] object-cover border border-[#442D25]/15 bg-[#E0C9A6] p-2" />
                    <div class="space-y-4">
                        <div class="font-buran text-xl uppercase tracking-[0.24em] text-[#442D25]">Досье</div>
                        <p class="font-storm text-base leading-7 text-[#442D25]/90">
                            Ваш товарищ это:<br>
                            Взрослый ребёнок,<br>
                            Молодой старик,<br>
                            Он же <strong>Эльдар</strong>.
                        </p>
                    </div>
                </div>
                <div class="rounded-[1.75rem] border border-[#442D25]/10 bg-[#E0C9A6]/80 p-6 text-[#442D25]">
                    <p class="font-storm text-base leading-7">Золотой ретривер. Любитель кофэ.<br>Характер вайбовый. Кошатник.<br>Бывший дизайнер. Еще учится жить.<br>Теряет лучшие годы. Урожай нулевых.<br>Прожил четверть жизни. Не женат.</p>
                </div>
            </section>

            <hr class="my-10 border-[#442D25]/20" />

            <section id="links" class="space-y-6 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD]/90 p-7 shadow-[0_20px_40px_rgba(68,45,37,0.06)]">
                <div class="font-buran text-sm uppercase tracking-[0.35em] text-[#442D25]">nomine uno in omnibus locis</div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <a href="https://vk.com/waxenov" class="link-button">ВКонтакте</a>
                    <a href="https://t.me/waxenov" class="link-button">Телега</a>
                    <a href="https://www.tiktok.com/@waxenov?_r=1&_t=ZS-95Onilsl0R2" class="link-button">ТикТоник</a>
                    <a href="https://www.instagram.com/waxenova?igsh=MXZpeHdtcjVyM21pcQ==" class="link-button">Постграм</a>
                    <a href="https://github.com/Waxenov" class="link-button">ГикХаб</a>
                    <a href="/" class="link-button">Портал</a>
                </div>
            </section>

            <div class="mt-10 rounded-[2rem] border border-[#442D25]/15 bg-[#FAEEDD]/90 p-5 text-center text-sm font-storm text-[#442D25]/80 shadow-[0_20px_35px_rgba(68,45,37,0.06)]">
                WAXENOV · MMXXVI
            </div>
        </div>
    </div>

    <style>
        @font-face { font-family: 'Buran'; src: url('/about/fonts/buran.ttf') format('truetype'); }
        @font-face { font-family: 'Storm'; src: url('/about/fonts/storm.otf') format('opentype'); }

        .font-buran { font-family: 'Buran', serif; }
        .font-storm { font-family: 'Storm', ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; }

        .link-button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 1rem 1.1rem;
            border-radius: 1.5rem;
            border: 2px solid rgba(68, 45, 37, 0.12);
            background: rgba(255, 255, 255, 0.8);
            color: #442D25;
            font-family: 'Storm', sans-serif;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            transition: transform 0.2s ease, border-color 0.2s ease, color 0.2s ease, background-color 0.2s ease;
            text-decoration: none;
        }

        .link-button:hover,
        .link-button:focus {
            background: rgba(162, 95, 42, 0.12);
            border-color: rgba(162, 95, 42, 0.35);
            color: #A25F2A;
            transform: translateY(-1px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('about-menu-toggle');
            const mobileMenu = document.getElementById('about-mobile-menu');

            if (toggle && mobileMenu) {
                toggle.addEventListener('click', function () {
                    mobileMenu.classList.toggle('hidden');
                });
            }
        });
    </script>
</x-app-layout>
