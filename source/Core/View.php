<?php


namespace source\Core;


use League\Plates\Engine;

class View
{
    private $engine;

    public function __construct(string $path = CONFIG_VIEW_PATH,
                                string $ext  = CONFIG_VIEW_EXT)
    {
        $this->engine = Engine::create($path, $ext);
    }

    /**
     * @return Path
     */
    public function path(string $name, string $path): View
    {
        $this->engine->addFolder($name, $path);
        return $this;
    }

    /**
     * @return Render
     */
    public function render(string $templateName, array $data): string
    {
        return $this->engine->render($templateName, $data);
    }

    /**
     * @return Engine
     */
    public function engine(): Engine
    {
        return $this->engine();
    }

}