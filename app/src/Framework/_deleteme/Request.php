<?php

namespace App\Framework\_deleteme;

class Request
{
    public function __construct(
        array $query = [],
        array $request = [],
        array $attributes = [],
        array $cookies = [],
        array $files = [],
        array $server = []
    ){}


  public function   input( )
  {

  }
}

/**********
 *
 *
 * $request->input(): Retrieves input values from the request payload.
 * $request->query(): Accesses query string parameters.
 * $request->json(): Retrieves JSON payload data.
 * $request->path(): Returns the current request path (e.g., foo/bar).
 * $request->url(): Gets the URL without query strings.
 * $request->fullUrl(): Provides the complete URL including query strings.
 *
 *
 *
 * Methods
 * Here are some commonly used methods:
 * Method    Description
 * input($key = null)    Retrieve input values as an associative array.
 * query($key = null)    Get values from the query string.
 * json($key = null)    Access JSON payload data.
 * path()    Get the current path info for the request.
 * fullUrl()    Get the full URL for the request.
 * is($pattern)    Check if the current request URI matches a pattern.
 * ajax()    Determine if the request is an AJAX call.
 *
 *
 ******/