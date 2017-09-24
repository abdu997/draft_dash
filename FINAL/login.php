<html>
    <head>
        <script src="js/angular.min.js"></script>
        <script src="js/jquery.js"></script>
        <style>
            .hidden {
                display: none;
            }
        </style>
    </head>
    <body ng-app="loginApp" ng-controller="loginController">
        <button id="loginTab">Login</button>
        <button id="registerTab">Register</button>
        <form id="loginForm">
            <label>Email</label>
            <input type="email" ng-model="email">
            <label>Password</label>
            <input type="password" ng-model="password">
            <input type="submit" value="Login" ng-click="login()">
        </form>
        <form id="registerForm" class="hidden">
            <label>Email</label>
            <input type="email" ng-model="registerEmail">
            <input ng-click="register()" type="submit" value="register">
        </form>
    </body>
    <script>
        $("#registerTab").click(function(e) {
            e.preventDefault();
            $("#loginForm").addClass("hidden");
            $("#registerForm").removeClass("hidden");
        });
        $("#loginTab").click(function(e) {
            e.preventDefault();
            $("#loginForm").removeClass("hidden");
            $("#registerForm").addClass("hidden");
        });
    </script>
    <script>
        var app = angular.module('loginApp', []);
        app.controller('loginController', function($scope) {
            $scope.login = function() {
                if ($scope.email == "") {
                    alert("Email invalid");
                } else if ($scope.password == ""){
                    alert("Password is needed");
                } else {
                    //alert("okay");
                    $http.post(
                        "php/loginRequest.php", {
                            'email': $scope.email,
                            'password': $scope.password
                        }
                    ).success(function(data) {
                        alert(data);
                        $scope.email = null;
                        $scope.password = null;
                    });
                }
            }
            
            $scope.register = function() {
                if ($scope.registerEmail == null) {
                    alert("valid email is required")
                } else {
                    alert("okay");
                    $scope.registerEmail = null;
                    $http.post(
                        "php/registerRequest.php", {
                            'email': $scope.registerEmail
                        }
                    ).success(function(data) {
                        alert(data);
                        $scope.registerEmail = null;
                    });
                }
            }
        });
    </script>
</html>
