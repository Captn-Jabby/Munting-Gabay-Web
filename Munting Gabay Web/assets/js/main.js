document.addEventListener('DOMContentLoaded', function() {
    // Smooth Scroll for Internal Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Scroll-to-Top Button
    const scrollToTopBtn = document.createElement('button');
    scrollToTopBtn.textContent = '↑';
    scrollToTopBtn.classList.add('scroll-to-top');
    document.body.appendChild(scrollToTopBtn);

    scrollToTopBtn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 200) {
            scrollToTopBtn.classList.add('show');
        } else {
            scrollToTopBtn.classList.remove('show');
        }
    });

    // Optional: Add Dynamic Content Loading or Animations
    // Example: Animate elements as they come into view
    const animateOnScroll = () => {
        const elements = document.querySelectorAll('.animate-on-scroll');
        elements.forEach(element => {
            if (element.getBoundingClientRect().top < window.innerHeight - 100) {
                element.classList.add('fade-in');
            }
        });
    };

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll();  // Initial check for elements already in view
});

$(document).ready(function() {
    // Fade in the body on page load with quicker transition
    $('body').hide().fadeIn(500);

    // Add a fade-in effect to sections on scroll
    $(window).on('scroll', function() {
        $('.fade-in').each(function() {
            var elementBottom = $(this).offset().top + $(this).outerHeight();
            var windowBottom = $(window).scrollTop() + $(window).height();
            if (windowBottom > elementBottom) {
                $(this).stop().animate({'opacity': 1}, 700); // Shorter fade-in time
            }
        });
    }).trigger('scroll'); // Trigger scroll event to show animations immediately

    // Optional: Fade out and in effect on button click
    $('.btn-success').on('click', function() {
        $('body').stop().fadeOut(300).fadeIn(300); // Shorter fade-out/in time
    });
});

$(document).ready(function() {
    // Fade in the body on page load
    $('body').css('opacity', 0).animate({ opacity: 1 }, 300); // Shorter fade-in time

    // Add a fade-in effect to sections on scroll
    $(window).on('scroll', function() {
        $('.fade-in').each(function() {
            var elementTop = $(this).offset().top;
            var windowBottom = $(window).scrollTop() + $(window).height();
            if (windowBottom > elementTop) {
                $(this).addClass('visible');
            }
        });
    }).trigger('scroll'); // Trigger scroll event to show animations immediately
});
