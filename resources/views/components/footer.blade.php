<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h4>Shopera</h4>
            <p>Votre boutique en ligne pour des produits uniques et tendances.</p>
        </div>
        <div class="footer-section">
            <h4>Navigation</h4>
            <ul>
                <li><a href="{{ route('home') }}">Accueil</a></li>
                <li><a href="{{ route('profil') }}">Profil</a></li>
                <li><a href="{{ route('products.index') }}">Produits</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h4>Suivez-nous</h4>
            <div class="social-icons">
                <!-- Vérifie que Font Awesome est chargé pour ces icônes -->
                <a href="#" target="_blank" class="social-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" target="_blank" class="social-icon">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" target="_blank" class="social-icon">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="footer-section">
            <h4>Newsletter</h4>
            <p>Recevez nos dernières offres et nouveautés.</p>
            <form action="#" method="POST">
                <input type="email" placeholder="Votre email" required>
                <button type="submit">S'abonner</button>
            </form>
        </div>
    </div>

    <!-- Section "Tous droits réservés" collée en bas du footer -->
    <div class="footer-bottom">
        <p>© {{ date('Y') }} Shopera. Tous droits réservés.</p>
    </div>
</footer>
