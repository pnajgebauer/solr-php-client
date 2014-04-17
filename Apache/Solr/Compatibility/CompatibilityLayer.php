<?php

interface Apache_Solr_Compatibility_CompatibilityLayer
{
    /**
     * Creates optional attributes for add command.
     *
     * @param boolean $allowDups Default false, guarantee the uniqueness of values.
     * @param boolean $overwritePending Default is negation of allowDups.
     * @param boolean $overwriteCommitted default is negation of allowDups.
     * @param integer $commitWithin The number of milliseconds that a document must be committed within, see @{link http://wiki.apache.org/solr/UpdateXmlMessages#The_Update_Schema} for details.  If left empty this property will not be set in the request.
     *
     * @return string string with optional attributes
     */
    public function createAddAttributes($allowDups = false, $overwritePending = true, $overwriteCommitted = true, $commitWithin = 0);

	/**
	 * Creates a commit command XML string.
	 *
	 * @param boolean $expungeDeletes Defaults to false, merge segments with deletes away
	 * @param boolean $waitFlush Defaults to true,  block until index changes are flushed to disk
	 * @param boolean $waitSearcher Defaults to true, block until a new searcher is opened and registered as the main query searcher, making the changes visible
	 * @param float $timeout Maximum expected duration (in seconds) of the commit operation on the server (otherwise, will throw a communication exception). Defaults to 1 hour
	 * @param boolean $softCommit Defaults to false, perform a soft commit instead of a hard commit.
	 * @return string An XML string
	 */
	function createCommitXml($expungeDeletes = false, $waitFlush = true, $waitSearcher = true, $timeout = 3600, $softCommit = false);

	/**
	 * Creates an optimize command XML string.
	 *
	 * @param boolean $waitFlush
	 * @param boolean $waitSearcher
	 * @param float $timeout Maximum expected duration of the commit operation on the server (otherwise, will throw a communication exception)
	 * @return string An XML string
	 */
	function createOptimizeXml($waitFlush = true, $waitSearcher = true);
}

