@extends('layouts.admin')
@section('content')
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Add Department!</h1>
                        </div>
                        <form class="user" id="deptForm" method="post" action="/dashboard/departments/{{$department->id}}">
                            @method('PUT')
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <label>Department</label>
                                    <input type="text" name="department" value="{{$department->department}}" class="form-control form-control-user" id="exampleFirstName"
                                        placeholder="Name of the Department">
                                        @if($errors->has('department'))

                                        <div class='text-danger mt-2'>
                                             * {{ $errors->first('department') }}
                                        </div>

                                   @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Reporting Emails </label>
                                <input type="text" class="form-control form-control-user" name="reporting_emails" id="reporting_emails"  placeholder="Email Address">
                                @if($errors->has('reporting_emails.*'))

                                <div class='text-danger mt-2'>
                                     * {{ $errors->first('reporting_emails.*') }}
                                </div>
                                 @endif
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Add Department
                            </button>

                        </form>
                        <form method="POST" action="/dashboard/departments/{{$department->id}}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn form-user btn-danger btn-round btn-block mt-2" onclick="return confirm('Are you sure you want to delete this department?');">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('footer-script')
<script >
(function(){

"use strict"


// Plugin Constructor
var TagsInput = function(opts){
    this.options = Object.assign(TagsInput.defaults , opts);
    this.init();
}

// Initialize the plugin
TagsInput.prototype.init = function(opts){
    this.options = opts ? Object.assign(this.options, opts) : this.options;

    if(this.initialized)
        this.destroy();

    if(!(this.orignal_input = document.getElementById(this.options.selector)) ){
        console.error("reporting_emails couldn't find an element with the specified ID");
        return this;
    }

    this.arr = [];
    this.wrapper = document.createElement('div');
    this.input = document.createElement('input');
    init(this);
    initEvents(this);

    this.initialized =  true;
    return this;
}

// Add Tags
TagsInput.prototype.addTag = function(string){

    if(this.anyErrors(string))
        return ;

    this.arr.push(string);
    var tagInput = this;

    var tag = document.createElement('span');
    tag.className = this.options.tagClass;
    tag.innerText = string;

    var closeIcon = document.createElement('a');
    closeIcon.innerHTML = '&times;';

    // delete the tag when icon is clicked
    closeIcon.addEventListener('click' , function(e){
        e.preventDefault();
        var tag = this.parentNode;

        for(var i =0 ;i < tagInput.wrapper.childNodes.length ; i++){
            if(tagInput.wrapper.childNodes[i] == tag)
                tagInput.deleteTag(tag , i);
        }
    })


    tag.appendChild(closeIcon);
    this.wrapper.insertBefore(tag , this.input);
    this.orignal_input.value = this.arr.join(',');

    return this;
}

// Delete Tags
TagsInput.prototype.deleteTag = function(tag , i){
    tag.remove();
    this.arr.splice( i , 1);
    this.orignal_input.value =  this.arr.join(',');
    return this;
}

// Make sure input string have no error with the plugin
TagsInput.prototype.anyErrors = function(string){
    if( this.options.max != null && this.arr.length >= this.options.max ){
        console.log('max tags limit reached');
        return true;
    }

    if(!this.options.duplicate && this.arr.indexOf(string) != -1 ){
        console.log('duplicate found " '+string+' " ')
        return true;
    }

    return false;
}

// Add tags programmatically
TagsInput.prototype.addData = function(array){
    var plugin = this;

    array.forEach(function(string){
        plugin.addTag(string);
    })
    return this;
}

// Get the Input String
TagsInput.prototype.getInputString = function(){
    return this.arr.join(',');
}


// destroy the plugin
TagsInput.prototype.destroy = function(){
    this.orignal_input.removeAttribute('hidden');

    delete this.orignal_input;
    var self = this;

    Object.keys(this).forEach(function(key){
        if(self[key] instanceof HTMLElement)
            self[key].remove();

        if(key != 'options')
            delete self[key];
    });

    this.initialized = false;
}

// Private function to initialize the tag input plugin
function init(tags){
    tags.wrapper.append(tags.input);
    tags.wrapper.classList.add(tags.options.wrapperClass);
    tags.orignal_input.setAttribute('hidden' , 'true');
    tags.orignal_input.parentNode.insertBefore(tags.wrapper , tags.orignal_input);
}

// initialize the Events
function initEvents(tags){
    tags.wrapper.addEventListener('click' ,function(){
        tags.input.focus();
    });


    tags.input.addEventListener('keydown' , function(e){
        var str = tags.input.value.trim();

        if( !!(~[9 , 13 , 188].indexOf( e.keyCode ))  )
        {
            e.preventDefault();
            tags.input.value = "";
            if(str != "")
                tags.addTag(str);
        }

    });
}


// Set All the Default Values
TagsInput.defaults = {
    selector : '',
    wrapperClass : 'tags-input-wrapper',
    tagClass : 'tag',
    max : null,
    duplicate: false
}

window.TagsInput = TagsInput;

})();

</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<script>

    var tagInput1 = new TagsInput({
        selector: 'reporting_emails',
        duplicate : false,
        max : 10
    });

    if("{{$department->reporting_emails}}"!=""){
       var emails ="{{$department->reporting_emails}}"
       emails = emails.split(',');
       tagInput1.addData(emails)
    }

</script>
<script>
$(document).ready(function() {
    $("#deptForm").validate({
        rules: {
            department: {
                required: true
            },
            reporting_emails: {
                required: true
            }
        },
        messages: {
            departments: {
                required: "Please enter a department"
            },
            reporting_emails: {
                required: "Please enter an email address"
            }
        }
    });

});

</script>
@endsection
