/* Setup general page controller */
angular.module('MetronicApp').controller('LoginController',
    ['$rootScope', '$scope', 'settings', '$http',
        function ($rootScope, $scope, settings, $http) {
            $scope.$on('$viewContentLoaded', function () {
                // initialize core components
                App.initAjax();

                // set default layout mode
                $rootScope.settings.layout.pageContentWhite = true;
                $rootScope.settings.layout.pageBodySolid = false;
                $rootScope.settings.layout.pageSidebarClosed = false;
            });


            var post_login = function () {
                $http({
                    method: 'POST',
                    url: './ws/auth',
                    data: $scope.auth.login
                }).then(function (r) {
                    if (r.data.id) {
                        window.location = "./";
                    } else {
                        $scope.auth.message.message = r.data;
                    }
                    $scope.auth.message.message = r.data;
                }, function (e) {
                    console.log(e);
                });
            }

            var create_account = function () {
                $scope.auth.message.message = "Loading..";
                $http({
                    method: 'POST',
                    url: './ws/create_account',
                    data: $scope.auth.c_account
                }).then(function (r) {
                    if (r.data == 'success') {
                        $scope.auth.message.message = "Account Created, Login to proceed ";
                        $scope.auth.message.type = 'success';
                        setTimeout(() => {
                            window.location = '#\login';
                        }, 2000);
                    } else {
                        $scope.auth.message.type = 'danger';
                        $scope.auth.message.message = r.data;
                    }
                }, function (e) {
                    console.log(e);
                });
            }


            $scope.auth = {
                message: {
                    type: 'success',
                    message: null,
                    dismiss: function () {
                        $scope.auth.message.message = null;
                    }
                },
                login: {
                    email: null,
                    password: null,
                    remember: false,
                    post_login: post_login
                },
                f_password: {
                    email: null
                },
                c_account: {
                    name: null,
                    email: null,
                    password: null,
                    c_password: null,
                    agree: false,
                    create_account: create_account
                }
            }




        }]);
