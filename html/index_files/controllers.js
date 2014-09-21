angular.module('index', [], function ($interpolateProvider) {
    $interpolateProvider.startSymbol('((');
    $interpolateProvider.endSymbol('))');
})
.controller('QuoteController', function ($scope, $timeout) {
  var cyclePromise;

  $scope.quotes = [
    {
      "name": "Lee Yuen",
      "name_key": "lee",
      "place": "ZDNet",
      "quote": "With Codiqa, it's even possible to let my product managers create the prototype app themselves, leaving the last phase of integration to techies like me. This could be the best way to get the entire team hands-on with the creation of the product."
    },
    {
      "name": "Reuven Cohen",
      "name_key": "reuven",
      "place": "Forbes",
      "quote": "If you are less programmer and more designer then you’ll love Codiqa. The cloud based platform builds your App with 100% HTML5 components. No need to code all over again after making your prototype. No coding necessary."
    },
    {
      "name": "Evan Stremke",
      "name_key": "evan",
      "place": "Creative Director",
      "quote": "Gone are the days when clients are left feeling underwhelmed by crappy sketches or static images. Codiqa isn't just simple, it's super fun, and makes the transition to development an absolute breeze."
    },
    {
      "name": "Tim Anglade",
      "name_key": "tim",
      "place": "Apigee",
      "quote": "I love it. I teach mobile app trainings around the world, and have observed 3,000-5,000 people use Codiqa just in the past few months."
    }
  ];
  
  $scope.selectedQuote = $scope.quotes[0];
  $scope.quoteIndex = 0;

  // Our quote cycler
  $scope.cycleQuote = function() {
    $scope.quoteIndex = ($scope.quoteIndex + 1) % $scope.quotes.length;
    $scope.setQuote($scope.quotes[$scope.quoteIndex], $scope.quoteIndex);
  }

  $scope.commitQuote = function(quote, index) {
    $scope.selectedQuote = quote;
    $scope.selectedQuote.fadeOut = false;
    $timeout.cancel(cyclePromise);
    cyclePromise = $timeout($scope.cycleQuote, 8000);
  }

  $scope.setQuote = function(quote, index, immediate) {
    $scope.selectedQuote.fadeOut = true;
    $scope.quoteIndex = index;
    $timeout(function() {
      $scope.commitQuote(quote, index)
    }, 300);
  };

  $scope.setQuote($scope.quotes[0], 0);

  $scope.quoteIndex = 0;
}).directive('slideAndRepeat', function($timeout) {
  return function(scope, element, attrs) {
    var timeoutId;


    var animate = function() {
      var left = parseInt(element.css('left'));
      var outerWidth = element.outerWidth();

      // Did it go all the way over?
      if(left <= -outerWidth) {
      }
      //console.log(left);
      element.css('left', (left-1) + 'px');
      timeoutId = $timeout(animate, 5);
    };

    element.bind('$destroy', function() {
      $timeout.cancel(timeoutId);
    });

    animate();
  }
});
