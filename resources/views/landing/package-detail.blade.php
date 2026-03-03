<x-layouts.landing :title="$package->name . ' - Alhasani Travel Umroh'">

    @push('styles')
        <style>
            .rich-text-container {
                font-size: 16px;
                line-height: 1.8;
                color: var(--text-dark);
            }

            .rich-text-container h2,
            .rich-text-container h3 {
                color: var(--primary-green);
                margin: 30px 0 15px;
                font-size: 24px;
            }

            .rich-text-container p {
                margin-bottom: 20px;
            }

            .rich-text-container ul {
                margin-left: 20px;
                margin-bottom: 20px;
            }

            .rich-text-container li {
                margin-bottom: 8px;
            }

            .clickable-image {
                cursor: pointer;
                transition: opacity 0.3s ease;
            }

            .clickable-image:hover {
                opacity: 0.9;
            }

            .image-hint {
                text-align: center;
                font-size: 13px;
                color: #666;
                padding: 10px;
                background: #f9f9f9;
                border-bottom: 1px solid var(--medium-gray);
                font-style: italic;
            }

            .image-modal {
                display: none;
                position: fixed;
                z-index: 9999;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.85);
                justify-content: center;
                align-items: center;
            }

            .image-modal-content {
                max-width: 90vw;
                max-height: 90vh;
                object-fit: contain;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
                animation: zoomIn 0.3s ease;
            }

            .image-modal-close {
                position: absolute;
                top: 20px;
                right: 30px;
                color: #fff;
                font-size: 40px;
                font-weight: bold;
                cursor: pointer;
                transition: color 0.3s;
                z-index: 10000;
            }

            .image-modal-close:hover {
                color: var(--primary-green, #bbb);
            }

            @keyframes zoomIn {
                from {
                    transform: scale(0.9);
                    opacity: 0;
                }

                to {
                    transform: scale(1);
                    opacity: 1;
                }
            }
        </style>
    @endpush

    <div style="padding-top: 130px; background-color: var(--light-gray); min-height: 100vh;">

        <section style="padding-top: 20px; padding-bottom: 80px;">
            <div class="container" style="max-width: 900px; margin: 0 auto;">

                <nav aria-label="breadcrumb" style="margin-bottom: 40px; display: flex; justify-content: center;">
                    <ol
                        style="display: flex; list-style: none; padding: 0; gap: 10px; font-weight: 500; font-size: 15px;">
                        <li><a href="{{ url('/') }}"
                                style="color: var(--primary-green); text-decoration: none;">Beranda</a></li>
                        <li style="color: var(--text-gray);">/</li>
                        <li><a href="{{ url('/paket') }}"
                                style="color: var(--primary-green); text-decoration: none;">Paket</a></li>
                        <li style="color: var(--text-gray);">/</li>
                        <li aria-current="page" style="color: var(--text-dark);">{{ $package->name }}</li>
                    </ol>
                </nav>

                <div class="section-title">
                    <h2>{{ $package->name }}</h2>
                    <p>Informasi detail perjalanan ibadah umroh Anda.</p>
                </div>

                <div
                    style="background: var(--white); border-radius: var(--border-radius); box-shadow: var(--shadow); overflow: hidden; border: 1px solid var(--medium-gray);">

                    @if ($package->image)
                        <div style="position: relative;">
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                class="clickable-image" onclick="openModal()" title="Klik untuk memperbesar gambar"
                                style="width: 100%; max-height: 500px; object-fit: cover; display: block;"
                                loading="lazy">
                            <div class="image-hint">
                                <i class="fas fa-search-plus"></i> Klik gambar untuk melihat brosur selengkapnya
                            </div>
                        </div>
                    @endif

                    <div style="padding: 40px 30px;">

                        <div class="rich-text-container">
                            {!! $package->description !!}
                        </div>

                        <div
                            style="margin-top: 50px; padding-top: 30px; border-top: 2px dashed var(--medium-gray); text-align: center;">
                            <p style="color: var(--text-gray); margin-bottom: 20px;">Butuh bantuan atau ingin mengatur
                                jadwal keberangkatan?</p>

                            @if ($site_settings->wa_number_indo)
                                @php
                                    $waNumber = preg_replace('/[^0-9]/', '', $site_settings->wa_number_indo);
                                    $message = "Assalamualaikum Warahmatullahi Wabarakatuh, saya ingin mendapatkan informasi lebih lanjut mengenai Paket *{$package->name}*. Mohon penjelasan terkait jadwal keberangkatan, harga, dan fasilitas yang tersedia. Terima kasih.";
                                @endphp

                                <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode($message) }}"
                                    target="_blank" class="btn btn-gold"
                                    style="display: inline-flex; align-items: center; justify-content: center; gap: 10px; font-size: 16px; padding: 15px 35px; width: auto; border: none; text-decoration: none;">
                                    <i class="fab fa-whatsapp" style="font-size: 1.2rem;"></i>
                                    Pesan via WhatsApp
                                </a>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </section>

    </div>

    @if ($package->image)
        <div id="fullImageModal" class="image-modal" onclick="closeModal(event)">
            <span class="image-modal-close" onclick="closeModal(event)">&times;</span>
            <img class="image-modal-content" id="modalImage" src="{{ asset('storage/' . $package->image) }}">
        </div>
    @endif

    @push('scripts')
        <script>
            function openModal() {
                var modal = document.getElementById("fullImageModal");
                if (modal) {
                    modal.style.display = "flex";
                    document.body.style.overflow = "hidden";
                }
            }

            function closeModal(event) {
                var modal = document.getElementById("fullImageModal");

                if (event.target === modal || event.target.className === 'image-modal-close') {
                    modal.style.display = "none";
                    document.body.style.overflow = "auto";
                }
            }
        </script>
    @endpush

</x-layouts.landing>
