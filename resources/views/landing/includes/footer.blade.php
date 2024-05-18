<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row px-3">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <h3>Universitas Tanjungpura</h3>
                    <p>
                        Jalan Prof. Dr. H. Hadari Nawawi Pontianak 78124
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li><i class="bi bi-telephone me-1"></i> <a href="tel:0561739630" target="_blank">(0561) 739630</a>
                        </li>
                        <li><i class="bi bi-envelope me-1"></i> <a href="mailto:untan_59@untan.ac.id"
                                target="_blank">untan_59@untan.ac.id</a></li>
                        <li><i class="bi bi-link-45deg me=2"></i> <a href="http://www.untan.ac.id"
                                target="_blank">http://www.untan.ac.id</a></li>

                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 footer-links">
                    <div class="d-flex justify-content-between flex-wrap gap-3 align-items-center">
                        @foreach ($partner_logos as $logo)
                            <a href="{{ $logo->link ?? '#' }}" target="_blank">
                                <img src="{{ filter_var($logo->logo, FILTER_VALIDATE_URL) ? $logo->logo : asset('storage/' . $logo->logo) }}"
                                    alt="{{ $logo->nama }}" class="img-fluid" style="max-width: 100px;"
                                    loading="lazy">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="copyright">
            &copy; Dies Natalis Untan | <strong><span>Universitas Tanjungpura</span></strong>. All Rights Reserved
        </div>
    </div>
</footer>
