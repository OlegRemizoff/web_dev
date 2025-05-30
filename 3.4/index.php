<?php
error_reporting(E_ALL);


// Создайте фотогалерею. Ваш скриптдолжен читать список файлов из определенной папки, отбирать из них изображения и выводить их на страницу. Также на странице должна быть форма добавления файла в галерею. Обработчик этой формы должен копировать загруженный файл в указанную папку и возвращаться на страницу галереи. (*Можете организовать проверку загружаемого файла)



$allowed_types  = ['png', 'jpg', 'jpeg', 'webp', 'gif'];

if (!is_dir('uploads')) {
  mkdir('uploads');
}

$uploads = scandir("uploads/");
$images = [];

foreach ($uploads as $img) {
    $res = explode('.', $img);
    // Проверка на допустимый формат
    // print_r("<pre>" . print_r($res, true) . "</pre>");
    // Array
    // (
    //     [0] => random picture
    //     [1] => jpg
    // )
    // Array
    // (
    //     [0] => x-men
    //     [1] => png
    // )

    if (in_array(end($res), $allowed_types)) {
        array_push($images, $img);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <title>Gallery</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/4.4/examples/album/"
    />

    <!-- Bootstrap core CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />

    <!-- Favicons -->
    <link
      rel="apple-touch-icon"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/apple-touch-icon.png"
      sizes="180x180"
    />
    <link
      rel="icon"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-32x32.png"
      sizes="32x32"
      type="image/png"
    />
    <link
      rel="icon"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon-16x16.png"
      sizes="16x16"
      type="image/png"
    />
    <link
      rel="manifest"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/manifest.json"
    />
    <link
      rel="mask-icon"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/safari-pinned-tab.svg"
      color="#563d7c"
    />
    <link
      rel="icon"
      href="https://getbootstrap.com/docs/4.4/assets/img/favicons/favicon.ico"
    />
    <meta
      name="msapplication-config"
      content="/docs/4.4/assets/img/favicons/browserconfig.xml"
    />
    <meta name="theme-color" content="#563d7c" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
  </head>

  <body cz-shortcut-listen="true">
    <!-- <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">About</h4>
              <p class="text-muted">
                Add some information about the album below, the author, or any
                other background context. Make it a few sentences long so folks
                can pick up some informative tidbits. Then, link them off to
                some social networking sites or contact information.
              </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li>
                  <a
                    href="https://getbootstrap.com/docs/4.4/examples/album/#"
                    class="text-white"
                    >Follow on Twitter</a
                  >
                </li>
                <li>
                  <a
                    href="https://getbootstrap.com/docs/4.4/examples/album/#"
                    class="text-white"
                    >Like on Facebook</a
                  >
                </li>
                <li>
                  <a
                    href="https://getbootstrap.com/docs/4.4/examples/album/#"
                    class="text-white"
                    >Email me</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
          <a
            href="https://getbootstrap.com/docs/4.4/examples/album/#"
            class="navbar-brand d-flex align-items-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              width="20"
              height="20"
              fill="none"
              stroke="currentColor"
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              aria-hidden="true"
              class="mr-2"
              viewBox="0 0 24 24"
              focusable="false"
            >
              <path
                d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"
              ></path>
              <circle cx="12" cy="13" r="4"></circle>
            </svg>
            <strong>Album</strong>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarHeader"
            aria-controls="navbarHeader"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header> -->
    <main role="main">
      <section class="jumbotron text-center">
        <div class="container">
          <h1>Галерея</h1>
          <form action="store.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded-3 bg-light">
            <div class="mb-3">
              <label for="formFile" class="form-label">Выберите изображение</label>
              <input class="form-control" type="file" name="preview" id="formFile" accept="image/*">
              <div class="form-text">Поддерживаются форматы: WEBP, JPG, PNG, GIF</div>
            </div>
            <button type="submit" class="btn btn-primary w-100 py-2">Загрузить изображение</button>
          </form>
            <!-- <a
              href="https://getbootstrap.com/docs/4.4/examples/album/#"
              class="btn btn-primary my-2"
              >Main call to action</a
            > -->
            <!-- <a
              href="https://getbootstrap.com/docs/4.4/examples/album/#"
              class="btn btn-secondary my-2"
              >Secondary action</a
            > -->
          </p>
        </div>
      </section>

      <div class="album py-5 bg-light">
        <div class="container">
          <div class="row">
            <?php for($i = 0; $i < count($images); $i++): ?>
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                  <img src="uploads/<?php echo $images[$i]; ?>" class="img-thumbnail" alt="...">
                  <div class="card-body">
                    <p class="card-text">
                      <?php echo $images[$i]; ?>
                    </p>
                    <div
                      class="d-flex justify-content-between align-items-center"
                    >
                      <div class="btn-group">
                        <!-- <button
                          type="button"
                          class="btn btn-sm btn-outline-secondary"
                        >
                          View
                        </button> -->
                      </div>
                      <!-- <small class="text-muted">9 mins</small> -->
                    </div>
                  </div>
                </div>
              </div>
            <?php endfor ?>
            <!-- <div class="col-md-4">
              <div class="card mb-4 shadow-sm">
                <svg
                  class="bd-placeholder-img card-img-top"
                  width="100%"
                  height="225"
                  xmlns="http://www.w3.org/2000/svg"
                  preserveAspectRatio="xMidYMid slice"
                  focusable="false"
                  role="img"
                  aria-label="Placeholder: Thumbnail"
                >
                  <title>Placeholder</title>
                  <rect width="100%" height="100%" fill="#55595c"></rect>
                  <text x="50%" y="50%" fill="#eceeef" dy=".3em">
                    Thumbnail
                  </text>
                </svg>
                <div class="card-body">
                  <p class="card-text">
                    This is a wider card with supporting text below as a natural
                    lead-in to additional content. This content is a little bit
                    longer.
                  </p>
                  <div
                    class="d-flex justify-content-between align-items-center"
                  >
                    <div class="btn-group">
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        View
                      </button>
                      <button
                        type="button"
                        class="btn btn-sm btn-outline-secondary"
                      >
                        Edit
                      </button>
                    </div>
                    <small class="text-muted">9 mins</small>
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>
    </main>

    <!-- <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="https://getbootstrap.com/docs/4.4/examples/album/#"
            >Back to top</a
          >
        </p>
        <p>
          Album example is Â© Bootstrap, but please download and customize it
          for yourself!
        </p>
        <p>
          New to Bootstrap?
          <a href="https://getbootstrap.com/">Visit the homepage</a> or read our
          <a
            href="https://getbootstrap.com/docs/4.4/getting-started/introduction/"
            >getting started guide</a
          >.
        </p>
      </div>
    </footer> -->
    <!-- <script
      src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
      crossorigin="anonymous"
    ></script> -->
  </body>
  <div id="slickdeals" data-initialized="1"></div>
</html>
