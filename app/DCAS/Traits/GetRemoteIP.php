<?php

namespace DCAS\Traits;

trait GetRemoteIP
{
    /**
     * @var array
     */
    protected $remote_ip_srcs = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR',
    ];

    /**
     * @return bool
     */
    public function isAllowed(): bool
    {
        return in_array($this->execute(), $this->whitelist);
    }

    /**
     * @return string
     */
    private function execute(): string
    {
        foreach ($this->remote_ip_srcs as $key) {
            if (array_key_exists($key, request()->server())) {
                foreach (explode(',', request()->server($key)) as $ip) {
//                    if (filter_var(trim($ip), FILTER_VALIDATE_IP,
//                            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE))
                    if (filter_var(trim($ip), FILTER_VALIDATE_IP)) {
                        return $ip;
                    }
                }
            }
        }
    }
}
