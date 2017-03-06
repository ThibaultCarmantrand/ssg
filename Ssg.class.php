<?php
/**
 * Main class of the static site generator.
 */
class Ssg {
  // Parsedown is the Markdown interpretor we use.
  // Twig is the template engine we use.
  private $Parsedown;
  private $twigLoader;
  private $twig;


  public function __construct($Parsedown, $twigLoader, $twig) {
    $this->setParsedown($Parsedown);
    $this->setTwigLoader($twigLoader);
    $this->setTwig($twig);
  }


  /**
   * SETTERS
   */

  public function setParsedown($parsedown) {
    $this->Parsedown = $parsedown;
  }



  public function setTwigLoader($twigLoader) {
    $this->twigLoader = $twigLoader;
  }



  public function setTwig($twig) {
    $this->twig = $twig;
  }





  /**
   * GETTERS
   */





  /**
   * UTILITARIES
   */

  private function scan_content_dir(string $directory) {
    return new FileSystemIterator(
      'content/' . $directory,
      FileSystemIterator::KEY_AS_PATHNAME
    );
  }



  /**
   * MAIN OPERATIONS
   */

  public function clean_output() {
    // Remove the output directory and regenerate it.
    if (is_dir('output')) {
      shell_exec('rm -R output');
    }
    mkdir('output');

    // For each directory in the content directory, we create another directory in the output directory.
    $iterator = $this->scan_content_dir('');
    foreach ($iterator as $file) {
      if (is_dir($file)) {
        mkdir('output/' . $file->getFileName());
      }
    }
  }


  /**
   * Generate the output files for each file in content/`$directory`.
   */
  public function generate_files(string $directory) {
    $iterator = $this->scan_content_dir($directory);

    foreach($iterator as $file) {
      // The filename without the extension.
      $fileName = explode('.', $file->getFilename())[0];

      // Pick the Markdown content and translate it in HTML.
      $contentHTML = $this->Parsedown->text(
        file_get_contents($file)
      );

      // Use the previous HTML code with the corresponding template.
      $finalContent = $this->twig->render(
        $directory . '.twig',
        array('content' => $contentHTML)
      );

      // Create a new file with this HTML code. We palce it in the output
      // directory.
      $newFileName = 'output/' . $directory . '/' . $fileName . '.html';

      file_put_contents($newFileName, $finalContent);
    }
  }



  /**
   * Generate all the site.
   * First, we clean the output directory.
   * Then we generate all files in the 'pages' and 'articles' directories;
   */
  public function generate_site() {
    $this->clean_output();
    $this->generate_files('articles');
    $this->generate_files('pages');
  }
}
