var notDead = angular.module('not-dead', []).config(function ($locationProvider) {
    $locationProvider.html5Mode({ enabled: true, requireBase: false });
});

notDead.controller('mainController', ['$scope', '$http', function ($scope, $http) {
    $scope.buyPieceOfMind = function () {
        $scope.creditInvalid = false;
        $scope.cvcInvalid = false;
        $scope.completed = false;
        $scope.failed = false;
        if ($scope.creditcard.trim().length != 16) {
            $scope.creditInvalid = true;
        }
        else if ($scope.cvc.length != 3) {
            $scope.cvcInvalid = true;
        }
        else {
            $scope.data = {
                formData: {
                    email: $scope.email,
                    cost: parseInt($scope.cost) * 100,
                    creditcard: $scope.creditcard,
                    cvc: $scope.cvc,
                    expiry_month: $scope.expiry_month,
                    expiry_year: $scope.expiry_year
                }
            };
            $http({
                url: '/sent',
                method: 'POST',
                data: $scope.data
            }).success(function (httpResponse) {
                console.log(httpResponse);
                if (httpResponse.status != 'succeeded') {
                    $scope.status = true;
                    console.log('response:', httpResponse.message);
                    $scope.message = httpResponse.message;
                }
                else {
                    $scope.status = true;
                    $scope.form.$invalid = true;
                    console.log('response:', httpResponse.status);
                    $scope.message = httpResponse.status;
                }
            })
        }
    }
}]);

notDead.controller('checkinController', ['$scope', '$http', function ($scope, $http) {
    $scope.data = {};
    $http.get('/db').then(function (res) {
        $scope.currentEmail = res.data.EMAIL || '';
        $scope.letKnowList = res.data.NOTIFY_LIST || '';
        $scope.lastCheckin = res.data.LAST_CHECK_IN || 0;
        var dateTime = new Date($scope.lastCheckin);
        $scope.lastCheckin = dateTime.toISOString();
        $scope.message = res.data.MESSAGE || '';
        var t = new Date(res.data.LAST_CHECK_IN);
        $scope.checkin = function () {
            $scope.data = {
                formData: {
                    currentEmail: $scope.currentEmail,
                    letKnowList: $scope.letKnowList,
                    message: $scope.message
                }
            }
        }
    });
}]);

notDead.controller('checkedController', ['$scope', '$http', function ($scope, $http) {
    $scope.checkin = function () {
        $scope.data = {
            formData: {
                currentEmail: $scope.currentEmail,
                letKnowList: $scope.letKnowList,
                message: $scope.message
            }
        }
        $http({
            url: '/checked',
            method: 'POST',
            data: $scope.data
        }).success(function (httpResponse) {
            $scope.checkedinStatus = true;
        })
    }
}])

