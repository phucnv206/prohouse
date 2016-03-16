(function () {
    var app = angular.module('pinut', ['ngSanitize']);
    app.controller('MainController', function ($http, $window, $location, $timeout) {
//        ---- register jquery
        $('.product').waypoint(function(direction) {
            if (direction === 'down') {
                $('.product-item').each(function (index) {
                    var elm = $(this);
                    $timeout(function () {
                        elm.addClass('animated flipInY');
                    }, index * 100);
                });
            }
        }, {
            offset: 380
        });
        $('.p-nav-item .nav-link').click(function (e) {
            e.preventDefault();
            var elm = $(this).attr('href');
            var offset = $('#nav').height() + 8;
            var top = $(elm).offset().top - offset;
            $('html, body').animate({ scrollTop: top }, 600);
        });
        $(window).scroll(function () {
            var top = $('#nav').offset().top;
            if (top > 150) {
                $('#nav').addClass('minimize');
            } else if (top === 0) {
                $('#nav').removeClass('minimize');
            }
        });
//        ---- end jquery
        var self = this;
        self.init = function () {
            self.selectedCategory = undefined;
            self.pageIndex = 0;
            self.pageSize = 3;
            self.contact = {
                company: '',
                email: '',
                phone: '',
                message: ''
            };
            self.apiListSlide();
            self.apiListPage();
            self.apiListCategory();
            self.apiListProduct();
            self.apiListPost();
        };
        self.apiListSlide = function () {
            $http.get('/api/slide/list').then(function successCallback(response) {
                self.slides = response.data;
                $timeout(function () {
                    self.loaded = true;
                }, 500);
            }, function errorCallback(response) {
            });
        };
        self.apiListPage = function () {
            $http.get('/api/page/list').then(function successCallback(response) {
                self.pages = response.data;
            }, function errorCallback(response) {
            });
        };
        self.apiListCategory = function () {
            $http.get('/api/category/list').then(function successCallback(response) {
                self.categories = response.data;
            }, function errorCallback(response) {
            });
        };
        self.apiListProduct = function () {
            $http.get('/api/product/list').then(function successCallback(response) {
                self.products = response.data;
            }, function errorCallback(response) {
            });
        };
        self.detailProduct = function (e, index) {
            e.preventDefault();
            self.selectedProduct = index;
            $('#product-detail').modal('show');
        };
        self.setCategory = function (e, id) {
            e.preventDefault();
            self.pageIndex = 0;
            self.selectedCategory = id;
        };
        self.nextPage = function (e) {
            e.preventDefault();
            if (self.pageIndex + self.pageSize < self.filtered.length) {
                self.pageIndex++;
            }
        };
        self.prevPage = function (e) {
            e.preventDefault();
            if (self.pageIndex > 0) {
                self.pageIndex--;
            }
        };
        self.detailPage = function (e, id) {
            self.selectedPage = id;
            $('#page-detail').modal('show');
        };
        self.sendContact = function () {
            self.contact[$('meta[name=csrf-param]').attr('content')] = $('meta[name=csrf-token]').attr('content');
            self.contactSubmitting = true;
            self.contactErrors = [];
            self.contactMessage = '';
            $http.post('/api/contact/send', self.contact).then(function successCallback(response) {
                var data = response.data;
                if ('errors' in data) {
                    angular.forEach(data.errors, function(value, key) {
                        this.push(value);
                    }, self.contactErrors);
                } else {
                    self.contact = {
                        company: '',
                        email: '',
                        phone: '',
                        message: ''
                    };
                    self.contactMessage = data.message;
                }
                $('.error-message').fadeIn();
                $timeout(function () {
                    $('.error-message').fadeOut();
                }, 3000);
                self.contactSubmitting = false;
            }, function errorCallback(response) {
                self.contactSubmitting = false;
            });
        };
        self.apiListPost = function () {
            $http.get('/api/post/list').then(function successCallback(response) {
                self.posts = response.data;
            }, function errorCallback(response) {
            });
        };
        self.detailPost = function (e, index) {
            e.preventDefault();
            self.selectedPost = index;
            $('#post-detail').modal('show');
        };
        self.changeLanguage = function (lang) {
            $window.location.href = '/location?lang=' + lang + '&return=' + $location.path();
        };
        self.init();
    });
})();