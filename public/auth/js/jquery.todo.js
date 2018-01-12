/**
* Theme: Velonic Admin Template
* Author: Coderthemes
* Todo Application
*/

!function($) {
    "use strict";

    var TodoApp = function() {
        this.$body = $("body"),
        this.$todoContainer = $('#todo-container'),
        this.$todoMessage = $("#todo-message"),
        this.$todoRemaining = $("#todo-remaining"),
        this.$todoTotal = $("#todo-total"),
        this.$archiveBtn = $("#btn-archive"),
        this.$undoneBtn = $("#btn-undone"),
        this.$todoList = $("#todo-list"),
        this.$todoDonechk = ".todo-done",
        this.$todoForm = $("#todo-form"),
        this.$todoForm2 = $("#todo-form2"),
        this.$todoInput = $("#todo-input-text"),
        this.$todoInput2 = $("#todo-input-text2"),
        // this.$todoDescription = $("#todo-description"),
        // this.$todoDate = $("#todo-input-date"),
        this.$todoUrl = $("#todo-url").data("value"),
        this.$todoUserUrl = $("#todo-user-url").data("value"),
        this.$todoBtn = $("#todo-btn-submit"),
        this.$todoBtn2 = $("#todo-btn-submit2"),
        // this.$todoToggleView = $("#todo-end-date"),
        /*this.$todoData = [
        {
            'id': '1',
            'text': 'Design One page theme',
            'done': false
        },
        {
            'id': '5',
            'text': 'Hehe!! This is looks cool!',
            'done': false
        },
        {
            'id': '6',
            'text': 'Build an angular app',
            'done': true
        }];*/
        this.$todoData = this.getPreviousTodo();
        this.$todoCompletedData = [];
        this.$todoUnCompletedData = [];
    };

    //mark/unmark - you can use ajax to save data on server side
    TodoApp.prototype.markTodo = function(todoId, complete) {
       for(var count=0; count<this.$todoData.length;count++) {
            if(this.$todoData[count].id == todoId) {
                this.$todoData[count].done = complete;
            }
       }
    },
    // previous todo
    TodoApp.prototype.getPreviousTodo = function() {
        var tks;
        $.ajax({
            dataType: 'json',
            method: 'get',
            url: this.$todoUserUrl,
            async: false,
            success: function(response){
                // console.log(response)
                tks = response;
            },
            error: function(data){
                console.log(data);
            },
        });
        return tks;
    },
    //adds new todo
    TodoApp.prototype.addTodo = function(inputNumber) {
        // console.log(this.$todoForm.serializeArray());
        // console.log(this.$todoForm2.serializeArray());
        var that = this;
        $.ajax({
            method: 'post',
            url: this.$todoUrl,
            // data: this.$todoForm.serializeArray(),
            data: inputNumber === 1 ? this.$todoForm.serializeArray() :this.$todoForm2.serializeArray(),
            async: true,
            success: function(response){
                // this.$todoData.push({'id': this.$todoData.length, 'text': todoText, 'done': false});
                that.$todoData.push(response);
                // this.$todoForm.reset
                //regenerate list
                $(that).find("input").val("");
                that.generate();
            },
            error: function(data){
                console.log(data);
            },
        });

    },
    //Archives the completed todos
    TodoApp.prototype.archives = function() {
    	this.$todoUnCompletedData = [];
        for(var count=0; count<this.$todoData.length;count++) {
            //geretaing html
            var todoItem = this.$todoData[count];
            if(todoItem.done == true) {
                this.$todoCompletedData.push(todoItem);
            } else {
                this.$todoUnCompletedData.push(todoItem);
            }
        }
        this.$todoData = [];
        this.$todoData = [].concat(this.$todoUnCompletedData);
        //regenerate todo list
        this.generate();
    },
    //Generates todos
    TodoApp.prototype.generate = function() {
        //clear list
        // this.getPreviousTodo();
        this.$todoList.html("");
        var remaining = 0;
        for(var count=0; count<this.$todoData.length;count++) {
            //generating html
            var todoItem = this.$todoData[count];
            if(todoItem.done == true || todoItem.done == "true")
                this.$todoList.prepend('<li class="list-group-item"><label class="cr-styled"><input checked type="checkbox" disabled class="todo-done" id="' + todoItem.id + '"><i class="fa"></i></label><span class="todo-text">' + todoItem.text + '</span><span class="label label-danger pointer m-l-5" id="btn-undone" title="Click to mark as undone">Undone?</span><span class="todo-date pull-right p-l-5">' + todoItem.end_date + '</span></li>');
            else {
                remaining = remaining + 1;
                this.$todoList.prepend('<li class="list-group-item"><label class="cr-styled"><input type="checkbox" disabled class="todo-done" id="' + todoItem.id + '"><i class="fa"></i></label><span class="todo-text">' + todoItem.text + '</span><span class="todo-date pull-right p-l-5">' + todoItem.end_date + '</span></li>');
            }
        }

        //set total in ui
        this.$todoTotal.text(this.$todoData.length);
        //set remaining
        this.$todoRemaining.text(remaining);
    },
    //init todo app
    TodoApp.prototype.init = function () {
        var $this = this;

        this.getPreviousTodo();

        //generating todo list
        this.generate();

        //binding archive
        this.$archiveBtn.on("click", function(e) {
        	e.preventDefault();
            $this.archives();
            return false;
        });

        //binding todo done chk
        $(document).on("change", this.$todoDonechk, function() {
            if(this.checked) 
                $this.markTodo($(this).attr('id'), true);
            else
                $this.markTodo($(this).attr('id'), false);
            //regenerate list
            $this.generate();
        });

        //binding the new todo button
        this.$todoBtn.on("click", function() {
            if ($this.$todoInput.val() == "" || typeof($this.$todoInput.val()) == 'undefined' || $this.$todoInput.val() == null) {
                sweetAlert("Oops...", "You forgot to enter the task name", "error");
                $this.$todoInput.focus();
            } else {
                $this.addTodo('1');
                // $this.addTodo($this.$todoInput.val());
            }
        });

        this.$todoBtn2.on("click", function() {
            if ($this.$todoInput2.val() == "" || typeof($this.$todoInput2.val()) == 'undefined' || $this.$todoInput2.val() == null) {
                sweetAlert("Oops...", "You forgot to enter the task name", "error");
                $this.$todoInput2.focus();
            } else {
                $this.addTodo('2');
            }
        });

        //mark todo as undone
        /*this.$undoneBtn.on("click", function() {
            sweetAlert("Oops...", "undone", "error");
            console.log('undone');
            alert('sos');
            // $this.addTodo($this.$todoInput.val());
        });*/
    },
    //init TodoApp
    $.TodoApp = new TodoApp, $.TodoApp.Constructor = TodoApp
    
}(window.jQuery),

//initializing todo app
function($) {
    "use strict";
    $.TodoApp.init()
}(window.jQuery);