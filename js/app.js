//jshint esversion: 6

document.addEventListener('DOMContentLoaded', function(){

    
    // аккордеон - раскрытие и закрытие
    const accordeonItems = document.querySelectorAll('.accordeon__item');

    if (accordeonItems) accordeonItems.forEach(item => {
        item.querySelector('.accordeon__header').addEventListener('click', event => {
            item.classList.toggle('accordeon__item--open');
        });
    });


    

    // выдвигающееся верхнее меню

    const menuButton = document.querySelector('.mainmenu__menubutton');
    const navMenu = document.querySelector('.navmenu--main');
    const background = document.querySelector('body');
    const mainMenu = document.querySelector('.mainmenu');

    function stopScrolling(event) {
        event.stopPropagation();
        event.preventDefault();
    }

    function openMenu(event) {
        // event.stopPropagation();
        mainMenu.classList.add('active');
        menuButton.classList.add('active');
        navMenu.classList.remove('closing');
        navMenu.classList.add('active');
        menuButton.removeEventListener('click', openMenu);
        menuButton.addEventListener('click', closeMenu);
        // slidesWrapper.addEventListener('touchend', closeMenu);
        navMenu.addEventListener('click', closeMenu);
        // window.addEventListener('scroll', closeMenu);

    }

    function closeMenu(event) {
        // event.stopPropagation();
        mainMenu.classList.remove('active');
        menuButton.classList.remove('active');
        navMenu.classList.add('closing');
        navMenu.classList.remove('active');
        menuButton.addEventListener('click', openMenu);
        menuButton.removeEventListener('click', closeMenu);
        // slidesWrapper.removeEventListener('touchend', closeMenu);
        navMenu.removeEventListener('click', closeMenu);
        // window.removeEventListener('scroll', closeMenu);
    }

    menuButton.addEventListener('click', openMenu);
    //topBar.addEventListener('touchstart', openMenu);

    // раздвигающиеся пункты меню

    const menuItems = navMenu.querySelectorAll('.navmenu__item--has-children');
    
    function closeDropdown(event){
        menuItems.forEach(i => {
            i.classList.remove('navmenu__item--open');
            window.removeEventListener('scroll', closeDropdown);
        });
    }

    menuItems.forEach(item => {
        item.addEventListener('click', event => {
            event.stopPropagation();
            if (event.target.getAttribute('href') == '#') event.preventDefault();
            if (item.classList.contains('navmenu__item--open')) {
                item.classList.toggle('navmenu__item--open');
                background.removeEventListener('click', closeDropdown);
                window.removeEventListener('scroll', closeDropdown);
            } else {
                menuItems.forEach(i => {
                    i.classList.remove('navmenu__item--open');
                });
                item.classList.add('navmenu__item--open');
                background.addEventListener('click', closeDropdown);
                window.addEventListener('scroll', closeDropdown);
            }
            
        });
    });

    // проявление контента при скролле

    const toScrollList = document.querySelectorAll('.toscroll');
    const missionSection = document.querySelector('.mission');


    const elementInView = (element, scrollOffset = 0) => {
        const elementTop = element.getBoundingClientRect().top;
        return (elementTop <= ((window.innerHeight || document.documentElement.clientHeight) - scrollOffset ));
    };

    const scrollHandler = () => {
        if (missionSection.getBoundingClientRect().top <= 200) {
            mainMenu.classList.add('active');
        }
        toScrollList.forEach((element) => {
            if (elementInView(element, 75)) {
                element.classList.remove('notscrolled');
                element.classList.add('scrolled');
            }
        });
    };

    
    toScrollList.forEach((element) => {
        element.classList.add('notscrolled');
    });
    scrollHandler(); 
    window.addEventListener('scroll', () => {
        scrollHandler();
    });

    // проявление титула после ожидания

    // const revealTitle = () => {
    //     const title = document.querySelector('.splash__title-block');
    //     if (title) title.classList.add('showed');
    // };

    // const titleTimeout = window.setTimeout(revealTitle, 2000);

    

});

