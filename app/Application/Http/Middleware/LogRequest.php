<?php

namespace Blog\Application\Http\Middleware;

use Closure;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class LogRequest
 *
 * @package Blog\Application\Http\Middleware
 */
class LogRequest
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * Logger constructor.
     *
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->logRequest($request);

        $response = $next($request);

        $this->logResponse($response, $request);

        return $response;
    }

    /**
     * Logs a message and given context.
     *
     * @param $msg
     * @param array $context
     */
    private function log($msg, array $context = array())
    {
        $this->logger->debug($msg, $context);
    }

    /**
     * @param Request $request
     */
    private function logRequest(Request $request)
    {
        $msg = sprintf('Request "%s %s"', $request->getMethod(), $request->getRequestUri());

        $context = [
            'request_method' => $request->getMethod(),
            'request_uri' => $request->getRequestUri(),
            'request_host' => $request->getHost(),
            'request_port' => $request->getPort(),
            'request_scheme' => $request->getScheme(),
            'request_client_ip' => $request->getClientIp(),
            'request_content_type' => $request->getContentType(),
            'request_acceptable_content_types' => $request->getAcceptableContentTypes(),
            'request_etags' => $request->getETags(),
            'request_charsets' => $request->getCharsets(),
            'request_languages' => $request->getLanguages(),
            'request_locale' => $request->getLocale(),
            'request_auth_user' => $request->getUser(),
            'request_auth_has_password' => !is_null($request->getPassword()),
            'request_encodings' => $request->getEncodings(),
            'request_client_ips' => $request->getClientIps(),
        ];

        $this->log($msg, $context);
    }

    /**
     * @param Response $response
     * @param Request $request
     */
    private function logResponse(Response $response, Request $request)
    {
        $msg = sprintf(
            'Response %s for "%s %s"',
            $response->getStatusCode(),
            $request->getMethod(),
            $request->getRequestUri()
        );

        $context = array(
            'response_status_code' => $response->getStatusCode(),
            'response_charset' => $response->getCharset(),
            'response_date' => $response->getDate(),
            'response_etag' => $response->getEtag(),
            'response_expires' => $response->getExpires(),
            'response_last_modified' => $response->getLastModified(),
            'response_max_age' => $response->getMaxAge(),
            'response_protocol_version' => $response->getProtocolVersion(),
            'response_ttl' => $response->getTtl(),
            'response_vary' => $response->getVary(),
        );

        $this->log($msg, $context);
    }
}
