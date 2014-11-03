var app = angular.module('UnisaGJ-Website', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider){
	$routeProvider.when('/', {
			templateUrl : 'partials/pages/main.html'
		})

		//INFO
		.when('/info', {
			templateUrl : 'partials/pages/info.html'
		})

		//SIGNUP
		.when('/signup', {
			templateUrl : 'partials/pages/signup.html'			
		})
		.otherwise({
			redirectTo: '/'
		});
}]);	

app.controller('mainController', function ($scope){

});

app.controller('signupFormCtrl', function ($scope){
    $scope.user = {};
	
	$scope.sendInfo = function (user) {
    var userData = 'user=' + user.name + '&mail=' + user.mail + '&pwd=' + user.password;

		$.ajax({
		    type: 'POST',
		    url: 'php/signup.php',
		    data: userData,
		    
		    success: function(result){
	        	if(result == "error") alert("Qualcosa è andato storto")
				else alert("Registrazione effettuata con successo. Ti abbiamo inviato una mail per l'attivazione.");
			},
		    
		    error: function(reult){
				alert("Qualcosa è andato storto");				              
		  	}
		});				    
	}
});

app.controller('contactFormCtrl', function ($scope){
	$scope.user = {};

	$scope.sendMessage = function (user) {
	var userData = 'text=' + user.message + '&mail=' + user.mail + '&obj=' + user.name;

        $.ajax({
                type: 'POST',
                url: 'php/mail.php',
                data: userData,

                success: function(result){                                                                                                                
                    if(result == "error") alert("Qualcosa è andato storto!");
                    else alert("Messaggio inviato " + user.name + ", finirà dritto nello spam :P");
                },
                
                error: function(reult){                            
                    alert("Qualcosa è andato storto!");
                }
        });
	}
});