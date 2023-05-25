<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>nested</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
  <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class="body-section" id="body">
  <div id="main">
    {{-- <ul class="section-list">
      <li class="section">
        <i class="fa fa-bars handle-section"></i>
        <span id="section-title">Item 6</span>
        <ul class="lesson-list">
          <button id="" class="btn btn-el">+ Add Lesson</button>
            <li class="lesson">
              <i class="fa fa-bars handle"></i>
              <div id="lesson-box" style="display: inline;">
                <input value="New Lesson" class="input" type="text" name="" id="input">
                <button class="button save-button">Save</button>
                <button class="button cancel-button">Cancel</button>
              </div>
            </li>
          <li class="lesson">
            <i class="fa fa-bars handle"></i>
            <div id="lesson-box" style="display: inline;">
              <input value="New Lesson" class="input" type="text" id="input">
              <button class="button save-button">Save</button>
              <button class="button cancel-button">Cancel</button>
            </div>
          </li>
        </ul>
      </li>
    </ul> --}}

    @foreach($sections as $section)

    <ul class="section-list" data-section-id="{{ $section->id }}">
      <li class="section" data-section-id="{{ $section->id }}">
        <i class="fa fa-bars handle-section"></i>
        <span id="section-title">{{ $section->name }}</span>
        <a href="" class="section-h-btn">Quick Actions</a>
        <ul class="lesson-list" data-section-id="{{ $section->id }}">
          <button id="" class="btn btn-el">+ Add Lesson</button>
          @if(isset($lessons[$section->id]))
          @foreach($lessons[$section->id] as $lesson)
          <li class="lesson" data-lesson-id="{{ $lesson->id }}">
            <i class="fa fa-bars handle"></i>
            <a href="#" id="lesson-link">{{ $lesson->name }}</a>
            <a href="#" class="publish-btn">Publish</a>
          </li>
          @endforeach
          @endif
        </ul>
      </li>
    </ul>
    @endforeach
  </div>
  <button id="btn"
    style="padding: 2%;background-color: rgb(240, 244, 248);margin-bottom: 10px;border-radius: 5px ;border: 1px solid grey;">Add
    New Section</button>

  <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>