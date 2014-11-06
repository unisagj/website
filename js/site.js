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

app.controller('mainController', ['$scope', function ($scope){

}]);

app.controller('signupFormCtrl', ['$scope', function ($scope){
    $scope.user = {};
	
	$scope.sendInfo = function (user) {
    var userData = 'user=' + user.name + '&mail=' + user.mail + '&pwd=' + user.password;    

		$.ajax({
		    type: 'POST',
		    url: 'php/signup.php',
		    data: userData,
		    
		    success: function(result){
	        	if(result == "error") app.showDialog("ERRORE :(", "Qualcosa è andato storto", "ERROR");
				else app.showDialog("OK :)", "Registrazione effettuata con successo. Ti abbiamo inviato una mail per l'attivazione.", "SUCCESS");
			},
		    
		    error: function(reult){
				app.showDialog("ERRORE :(", "Qualcosa è andato storto", "ERROR");				              
		  	}
		});				    
	}
}]);

app.controller('contactFormCtrl', ['$scope', function ($scope){
	$scope.user = {};

	$scope.sendMessage = function (user) {
	var userData = 'text=' + user.message + '&mail=' + user.mail + '&obj=' + user.name;

        $.ajax({
                type: 'POST',
                url: 'php/mail.php',
                data: userData,

                success: function(result){                                                                                                                
                    if(result == "error") app.showDialog("ERRORE :(", "Qualcosa è andato storto!"), "ERROR";
                    else app.showDialog("FATTO :)", "Messaggio inviato " + user.name + ", finirà dritto nello spam :P", "SUCCESS");
                },
                
                error: function(reult){                            
                    app.showDialog("ERRORE :(", "Qualcosa è andato storto!", "ERROR");
                }
        });
	}
}]);



$(function() {
	app.dialogWrap = $('#modal-wrap');
	//type can be ERROR or SUCCESS
	var dialogButton = $("#modal-dialog>#close-btn");
	dialogButton.click( function () {
			app.dialogWrap.fadeOut(300);
		});

	app.showDialog = function (title, message, type){
		var dialogTitle = $("#dialog-title"),
			dialogContent = $("#dialog-content");
		
		app.dialogWrap.fadeIn(300);	
		
		if (type === "ERROR"){
			dialogTitle.css("background-color", "#f00");
		} else if (type === "SUCCESS") {
			dialogTitle.css("background-color", "#008000");
		}
		
		dialogTitle.html(title);
		dialogContent.html(message);	
	}	
});