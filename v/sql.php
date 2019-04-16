<section class="content pt-3">
  <div class="container-fluid">
    <div class="row clearfix">
      <div class="col-lg-12">
        <div class="card">
          <div class="body">
            <h2>SQL útil</h2>
            <?php 
            if(!empty($entries)) {
              foreach ($entries as $entry) { ?>
                <div class="code-box" id="<?= $entry['id'] ?>">
                  <h3 style="background: <?= $entry['background'] ?>;color:<?= $entry['font-color'] ?>"><?= $entry['title'] ?></h3>
                  <div class="text-right">
                    <span class="badge badge-primary"><?= $entry['category_name'] ?></span>
                  </div>
                  <h5><?= $entry['description'] ?></h5>
                  <pre class="prettyprint"><?= htmlentities($entry['content']) ?></pre>
                </div>
              <?php } 
            } else { ?>
              <p>No hay entradas para esta categoría</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>