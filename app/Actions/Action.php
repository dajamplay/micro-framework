<?php


namespace App\Actions;

use App\Support\ResponseDTO\ResponseDTO;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

abstract class Action
{
    protected ServerRequestInterface $request;
    private RequestHandlerInterface $handler;

    public function __construct(ServerRequestInterface $request, RequestHandlerInterface $handler)
    {
        $this->request = $request;
        $this->handler = $handler;
    }

    protected function render(string $template, array $data = [],  $headers = []): ResponseInterface
    {
        $this->request = $this->request->withAttribute(ResponseDTO::class, new ResponseDTO($template, $data, 200, $headers));
        return $this->handler->handle($this->request);
    }

    protected function redirect(string $url, int $status = 302, $headers = []): ResponseInterface
    {
        $headers['Location'] = $url;
        $this->request = $this->request->withAttribute(ResponseDTO::class, new ResponseDTO('', [], $status, $headers));
        return $this->handler->handle($this->request);
    }

    protected function getQueryParam($name) {
        if ($params = $this->request->getQueryParams()) {
            if (isset($params[$name])) {
                if ($params[$name] != "") {
                    return $params[$name];
                } else {
                    return null;
                }
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
    
    protected function moveUploadedFile(string $directory, $uploadedFile): string
    {
        $fileName = $uploadedFile->getClientFilename();
        $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $fileName);
        return $fileName;
    }

    protected function getUploadedFile(string $name) {
        $uploadedFiles = $this->request->getUploadedFiles();
        return $uploadedFiles[$name];
    }
}