<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Order;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetOrderDetails
 *
 * Some data regarding this order, including the list of documents attached to the order. Useful for
 * finding attached letters, prescription renewal chains, and lab/imaging results. Note: This endpoint
 * may rely on specific settings to be enabled in athenaNet Production to function properly that are
 * not required in other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class GetOrderDetails extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/orders/{$this->orderid}";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  int  $orderid orderid
     * @param  null|bool  $showexternalcodes If set, translate the order information to relevant external vocabularies, where available. Examples are medictions to RxNorm and NDC, vaccines to CVX and MVX, labs to LOINC, etc. Our mappings are not exhaustive.
     * @param  null|bool  $showquestions Some order types like labs and imaging orders have additional pertinant information in a question/answer format. Setting this will return that data.
     * @param  null|bool  $showstructuredauthorizationdetails When set, returns Prior Authorization and insurances for some order types, separately and in a structured version than those returned in showquestions.
     */
    public function __construct(
        protected int $encounterid,
        protected int $orderid,
        protected ?bool $showexternalcodes = null,
        protected ?bool $showquestions = null,
        protected ?bool $showstructuredauthorizationdetails = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showexternalcodes' => $this->showexternalcodes,
            'showquestions' => $this->showquestions,
            'showstructuredauthorizationdetails' => $this->showstructuredauthorizationdetails,
        ]);
    }
}
