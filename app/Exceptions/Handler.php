use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

public function render($request, Throwable $exception)
{
    if ($exception instanceof NotFoundHttpException) {
        return response()->view('errors.404', [], 404);
    }

    return parent::render($request, $exception);
}
