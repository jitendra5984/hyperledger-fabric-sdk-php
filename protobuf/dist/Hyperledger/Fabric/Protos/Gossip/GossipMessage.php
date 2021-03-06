<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: gossip/message.proto

namespace Hyperledger\Fabric\Protos\Gossip;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * GossipMessage defines the message sent in a gossip network
 *
 * Generated from protobuf message <code>gossip.GossipMessage</code>
 */
class GossipMessage extends \Google\Protobuf\Internal\Message
{
    /**
     * used mainly for testing, but will might be used in the future
     * for ensuring message delivery by acking
     *
     * Generated from protobuf field <code>uint64 nonce = 1;</code>
     */
    private $nonce = 0;
    /**
     * The channel of the message.
     * Some GossipMessages may set this to nil, because
     * they are cross-channels but some may not
     *
     * Generated from protobuf field <code>bytes channel = 2;</code>
     */
    private $channel = '';
    /**
     * determines to which peers it is allowed
     * to forward the message
     *
     * Generated from protobuf field <code>.gossip.GossipMessage.Tag tag = 3;</code>
     */
    private $tag = 0;
    protected $content;

    public function __construct() {
        \GPBMetadata\Gossip\Message::initOnce();
        parent::__construct();
    }

    /**
     * used mainly for testing, but will might be used in the future
     * for ensuring message delivery by acking
     *
     * Generated from protobuf field <code>uint64 nonce = 1;</code>
     * @return int|string
     */
    public function getNonce()
    {
        return $this->nonce;
    }

    /**
     * used mainly for testing, but will might be used in the future
     * for ensuring message delivery by acking
     *
     * Generated from protobuf field <code>uint64 nonce = 1;</code>
     * @param int|string $var
     * @return $this
     */
    public function setNonce($var)
    {
        GPBUtil::checkUint64($var);
        $this->nonce = $var;

        return $this;
    }

    /**
     * The channel of the message.
     * Some GossipMessages may set this to nil, because
     * they are cross-channels but some may not
     *
     * Generated from protobuf field <code>bytes channel = 2;</code>
     * @return string
     */
    public function getChannel()
    {
        return $this->channel;
    }

    /**
     * The channel of the message.
     * Some GossipMessages may set this to nil, because
     * they are cross-channels but some may not
     *
     * Generated from protobuf field <code>bytes channel = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setChannel($var)
    {
        GPBUtil::checkString($var, False);
        $this->channel = $var;

        return $this;
    }

    /**
     * determines to which peers it is allowed
     * to forward the message
     *
     * Generated from protobuf field <code>.gossip.GossipMessage.Tag tag = 3;</code>
     * @return int
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * determines to which peers it is allowed
     * to forward the message
     *
     * Generated from protobuf field <code>.gossip.GossipMessage.Tag tag = 3;</code>
     * @param int $var
     * @return $this
     */
    public function setTag($var)
    {
        GPBUtil::checkEnum($var, \Hyperledger\Fabric\Protos\Gossip\GossipMessage_Tag::class);
        $this->tag = $var;

        return $this;
    }

    /**
     * Membership
     *
     * Generated from protobuf field <code>.gossip.AliveMessage alive_msg = 5;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\AliveMessage
     */
    public function getAliveMsg()
    {
        return $this->readOneof(5);
    }

    /**
     * Membership
     *
     * Generated from protobuf field <code>.gossip.AliveMessage alive_msg = 5;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\AliveMessage $var
     * @return $this
     */
    public function setAliveMsg($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\AliveMessage::class);
        $this->writeOneof(5, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.gossip.MembershipRequest mem_req = 6;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\MembershipRequest
     */
    public function getMemReq()
    {
        return $this->readOneof(6);
    }

    /**
     * Generated from protobuf field <code>.gossip.MembershipRequest mem_req = 6;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\MembershipRequest $var
     * @return $this
     */
    public function setMemReq($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\MembershipRequest::class);
        $this->writeOneof(6, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.gossip.MembershipResponse mem_res = 7;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\MembershipResponse
     */
    public function getMemRes()
    {
        return $this->readOneof(7);
    }

    /**
     * Generated from protobuf field <code>.gossip.MembershipResponse mem_res = 7;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\MembershipResponse $var
     * @return $this
     */
    public function setMemRes($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\MembershipResponse::class);
        $this->writeOneof(7, $var);

        return $this;
    }

    /**
     * Contains a ledger block
     *
     * Generated from protobuf field <code>.gossip.DataMessage data_msg = 8;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\DataMessage
     */
    public function getDataMsg()
    {
        return $this->readOneof(8);
    }

    /**
     * Contains a ledger block
     *
     * Generated from protobuf field <code>.gossip.DataMessage data_msg = 8;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\DataMessage $var
     * @return $this
     */
    public function setDataMsg($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\DataMessage::class);
        $this->writeOneof(8, $var);

        return $this;
    }

    /**
     * Used for push&pull
     *
     * Generated from protobuf field <code>.gossip.GossipHello hello = 9;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\GossipHello
     */
    public function getHello()
    {
        return $this->readOneof(9);
    }

    /**
     * Used for push&pull
     *
     * Generated from protobuf field <code>.gossip.GossipHello hello = 9;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\GossipHello $var
     * @return $this
     */
    public function setHello($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\GossipHello::class);
        $this->writeOneof(9, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.gossip.DataDigest data_dig = 10;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\DataDigest
     */
    public function getDataDig()
    {
        return $this->readOneof(10);
    }

    /**
     * Generated from protobuf field <code>.gossip.DataDigest data_dig = 10;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\DataDigest $var
     * @return $this
     */
    public function setDataDig($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\DataDigest::class);
        $this->writeOneof(10, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.gossip.DataRequest data_req = 11;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\DataRequest
     */
    public function getDataReq()
    {
        return $this->readOneof(11);
    }

    /**
     * Generated from protobuf field <code>.gossip.DataRequest data_req = 11;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\DataRequest $var
     * @return $this
     */
    public function setDataReq($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\DataRequest::class);
        $this->writeOneof(11, $var);

        return $this;
    }

    /**
     * Generated from protobuf field <code>.gossip.DataUpdate data_update = 12;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\DataUpdate
     */
    public function getDataUpdate()
    {
        return $this->readOneof(12);
    }

    /**
     * Generated from protobuf field <code>.gossip.DataUpdate data_update = 12;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\DataUpdate $var
     * @return $this
     */
    public function setDataUpdate($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\DataUpdate::class);
        $this->writeOneof(12, $var);

        return $this;
    }

    /**
     * Empty message, used for pinging
     *
     * Generated from protobuf field <code>.gossip.Empty empty = 13;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\PBEmpty
     */
    public function getEmpty()
    {
        return $this->readOneof(13);
    }

    /**
     * Empty message, used for pinging
     *
     * Generated from protobuf field <code>.gossip.Empty empty = 13;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\PBEmpty $var
     * @return $this
     */
    public function setEmpty($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\PBEmpty::class);
        $this->writeOneof(13, $var);

        return $this;
    }

    /**
     * ConnEstablish, used for establishing a connection
     *
     * Generated from protobuf field <code>.gossip.ConnEstablish conn = 14;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\ConnEstablish
     */
    public function getConn()
    {
        return $this->readOneof(14);
    }

    /**
     * ConnEstablish, used for establishing a connection
     *
     * Generated from protobuf field <code>.gossip.ConnEstablish conn = 14;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\ConnEstablish $var
     * @return $this
     */
    public function setConn($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\ConnEstablish::class);
        $this->writeOneof(14, $var);

        return $this;
    }

    /**
     * Used for relaying information
     * about state
     *
     * Generated from protobuf field <code>.gossip.StateInfo state_info = 15;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\StateInfo
     */
    public function getStateInfo()
    {
        return $this->readOneof(15);
    }

    /**
     * Used for relaying information
     * about state
     *
     * Generated from protobuf field <code>.gossip.StateInfo state_info = 15;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\StateInfo $var
     * @return $this
     */
    public function setStateInfo($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\StateInfo::class);
        $this->writeOneof(15, $var);

        return $this;
    }

    /**
     * Used for sending sets of StateInfo messages
     *
     * Generated from protobuf field <code>.gossip.StateInfoSnapshot state_snapshot = 16;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\StateInfoSnapshot
     */
    public function getStateSnapshot()
    {
        return $this->readOneof(16);
    }

    /**
     * Used for sending sets of StateInfo messages
     *
     * Generated from protobuf field <code>.gossip.StateInfoSnapshot state_snapshot = 16;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\StateInfoSnapshot $var
     * @return $this
     */
    public function setStateSnapshot($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\StateInfoSnapshot::class);
        $this->writeOneof(16, $var);

        return $this;
    }

    /**
     * Used for asking for StateInfoSnapshots
     *
     * Generated from protobuf field <code>.gossip.StateInfoPullRequest state_info_pull_req = 17;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\StateInfoPullRequest
     */
    public function getStateInfoPullReq()
    {
        return $this->readOneof(17);
    }

    /**
     * Used for asking for StateInfoSnapshots
     *
     * Generated from protobuf field <code>.gossip.StateInfoPullRequest state_info_pull_req = 17;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\StateInfoPullRequest $var
     * @return $this
     */
    public function setStateInfoPullReq($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\StateInfoPullRequest::class);
        $this->writeOneof(17, $var);

        return $this;
    }

    /**
     *  Used to ask from a remote peer a set of blocks
     *
     * Generated from protobuf field <code>.gossip.RemoteStateRequest state_request = 18;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\RemoteStateRequest
     */
    public function getStateRequest()
    {
        return $this->readOneof(18);
    }

    /**
     *  Used to ask from a remote peer a set of blocks
     *
     * Generated from protobuf field <code>.gossip.RemoteStateRequest state_request = 18;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\RemoteStateRequest $var
     * @return $this
     */
    public function setStateRequest($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\RemoteStateRequest::class);
        $this->writeOneof(18, $var);

        return $this;
    }

    /**
     * Used to send a set of blocks to a remote peer
     *
     * Generated from protobuf field <code>.gossip.RemoteStateResponse state_response = 19;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\RemoteStateResponse
     */
    public function getStateResponse()
    {
        return $this->readOneof(19);
    }

    /**
     * Used to send a set of blocks to a remote peer
     *
     * Generated from protobuf field <code>.gossip.RemoteStateResponse state_response = 19;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\RemoteStateResponse $var
     * @return $this
     */
    public function setStateResponse($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\RemoteStateResponse::class);
        $this->writeOneof(19, $var);

        return $this;
    }

    /**
     * Used to indicate intent of peer to become leader
     *
     * Generated from protobuf field <code>.gossip.LeadershipMessage leadership_msg = 20;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\LeadershipMessage
     */
    public function getLeadershipMsg()
    {
        return $this->readOneof(20);
    }

    /**
     * Used to indicate intent of peer to become leader
     *
     * Generated from protobuf field <code>.gossip.LeadershipMessage leadership_msg = 20;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\LeadershipMessage $var
     * @return $this
     */
    public function setLeadershipMsg($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\LeadershipMessage::class);
        $this->writeOneof(20, $var);

        return $this;
    }

    /**
     * Used to learn of a peer's certificate
     *
     * Generated from protobuf field <code>.gossip.PeerIdentity peer_identity = 21;</code>
     * @return \Hyperledger\Fabric\Protos\Gossip\PeerIdentity
     */
    public function getPeerIdentity()
    {
        return $this->readOneof(21);
    }

    /**
     * Used to learn of a peer's certificate
     *
     * Generated from protobuf field <code>.gossip.PeerIdentity peer_identity = 21;</code>
     * @param \Hyperledger\Fabric\Protos\Gossip\PeerIdentity $var
     * @return $this
     */
    public function setPeerIdentity($var)
    {
        GPBUtil::checkMessage($var, \Hyperledger\Fabric\Protos\Gossip\PeerIdentity::class);
        $this->writeOneof(21, $var);

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->whichOneof("content");
    }

}

