/* Setup general page controller */
angular.module('MetronicApp').controller('ProjectsController', ['$rootScope', '$scope', 'settings', '$http','$state','$stateParams',
 function ($rootScope, $scope, settings, $http,$state,$stateParams) {
    $scope.$on('$viewContentLoaded', function () {
        // initialize core components
        App.initAjax();

        // set default layout mode
        $rootScope.settings.layout.pageContentWhite = true;
        $rootScope.settings.layout.pageBodySolid = false;
        $rootScope.settings.layout.pageSidebarClosed = false;
    });

    $scope.projects = [];
    $scope.project = false;

    $scope.projects_info = [];
    $scope.project_info = {
        tasks: []  

    };

    
 

    var get_projects = function () {
        $http.get('demo/projects.json').then(function (r) {
            $scope.projects = r.data;           
            $scope.select_project($scope.projects[0]);
        });

    }
    get_projects();

    $scope.toggle_search = function () {
        $scope.show_search = !$scope.show_search;
        if ($scope.show_search) {
            $('#searchProjects').focus();
        }
    }
    $scope.select_project = function(project){
        $scope.project = project;
    }


    $scope.project_form = function (project) {
        if (project !== 0) {
            $scope.project.form = project;
        } else {
            var form = ($scope.project.form);
            for (const key of Object.keys(form)) {
                $scope.tenant.form[key] = null;

            }
        }
    }
    var get_project_info = function () {        
        $http.get('demo/tasks.json').then(function (r) { 
            $scope.project_info.tasks = r.data;             
        });
            
    }

    // var get_projects_info = function () {

    //     $scope.projects_info = projects_info
    //     get_project_info(); 
    //     // $scope.get_project_info($scope.projects_info[0]);
        
    // }


   
    get_project_info();
  
   

    if($stateParams.project_id){
        // $http.get('url').then(function(r){$scope.project = r.data;})
    }
   




}]);
