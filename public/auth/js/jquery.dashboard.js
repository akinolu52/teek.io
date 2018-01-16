/**
 * Theme: Velonic Admin Template
 * Author: Coderthemes
 * Module/App: Dashboard Application
 */

!function($) {
    "use strict";

    var Dashboard = function() {
        this.$body = $("body"),
            this.$weeklyDataUrl = $("#weeklyDataUrl").data("value"),
            this.$yearlyDataUrl = $("#yearlyDataUrl").data("value")
    };

    //initializing various charts and components
    Dashboard.prototype.init = function() {
        /**
         * Morris charts
         */
        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

        //Line chart
        Morris.Line({
            element: 'morris-line-example',
            data: this.yearlyData() ,
            xkey: 'y',
            ykeys: ['a', 'b'],
            // labels: ['Series A', 'Series B'],
            labels: ['Pending', 'Completed'],
            xLabelFormat: function(x) {
                var month = months[x.getMonth()];
                return month;
            },
            dateFormat: function(x) {
                var month = months[new Date(x).getMonth()];
                return month;
            },
            resize: true,
            lineColors: ['#1a2942', '#3bc0c3']
        });

        //Bar chart
        Morris.Bar({
            element: 'morris-bar-example',
            data:/* [
             { y: 'Sunday', a: 75,  b: 65 , c: 20 },
             { y: 'Monday', a: 50,  b: 40 , c: 50 },
             { y: 'Tuesday', a: 75,  b: 65 , c: 95 },
             { y: 'Wednesday', a: 50,  b: 40 , c: 22 },
             { y: 'Thursday', a: 75,  b: 65 , c: 56 },
             { y: 'Friday', a: 100, b: 90 , c: 60 },
             { y: 'Saturday', a: 100, b: 90 , c: 60 }
             ]*/this.weeklyData(),
            xkey: 'y',
            ykeys: ['a', 'b', 'c'],
            // labels: ['Series A', 'Series B', 'Series c'],
            labels: ['Completed Task', 'Ongoing Task', 'Pending Task'],
            barColors: ['#3bc0c3', '#1a2942', '#dcdcdc']
        });


        //Chat application -> You can initialize/add chat application in any page.
        // $.ChatApp.init();
    },

        Dashboard.prototype.weeklyData = function() {
            var tks;
            $.ajax({
                dataType: 'json',
                method: 'get',
                url: this.$weeklyDataUrl,
                async: false,
                success: function(response){
                    tks = response;
                    console.log(response);
                    if (response == null || response == ''){
                        // console.log('week data'+response);
                        // $("#no-weekly-data").html('<div class="portlet-body"><h4 class="p-t-0">No data for this week!</h4></div>');
                        jQuery("#morris-bar-example").remove();
                        jQuery("#no-weekly-data").toggle();
                    }
                },
                error: function(data){
                    console.log(data);
                },
            });
            return tks;
        },
        Dashboard.prototype.yearlyData = function() {
            // console.log(this.$weeklyDataUrl);
            var tks;
            $.ajax({
                dataType: 'json',
                method: 'get',
                url: this.$yearlyDataUrl,
                async: false,
                success: function(response){
                    tks = response;
                },
                error: function(data){
                    console.log(data);
                },
            });
            return tks;
        },
        //init dashboard
        $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard

}(window.jQuery),

//initializing dashboad
    function($) {
        "use strict";
        $.Dashboard.init()
    }(window.jQuery);



